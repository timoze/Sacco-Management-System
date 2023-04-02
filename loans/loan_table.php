<?php
ob_start();
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) 
{
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
  } else{
    $logged_inuser = $_SESSION['member_id'];
    $user_department = get_user_departmentfrom_id($dbh, $logged_inuser);
    //print $user_department;
    $department_name    =   get_user_department($dbh, $department_id);
    $loan_principal     =   $_REQUEST['principal_amount'];
    $loan_rate          =   $_REQUEST['rate'];
    $period             =   $_REQUEST['period'];
    $logo = '../' . LOGO;
    //$loan_type = LOAN_FORMULA;
    if (LOAN_FORMULA=='1') {
        $loan_type = "Reducing Balance";
    }else{
        $loan_type = "Flat Rate";
    }
  	?>
<!DOCTYPE HTML>
<html>
<head>
	  <title>Badili Sacco | Loan Breakdown</title>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	<!-- //js-->
		<style type="text/css">
			@media print {
  				#other{
  				  display: none;
  				}
			}
		</style>
</head> 
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_content">
								<table  border="0"  style="width:100%"> 
									  <thead> 
                      <tr style="background-color: #5c0e1e;" >
									      <th colspan="3" style="text-align: left; border-right: 0;"><img src="<?php echo $logo;?>" width="200" height="80"></th>	
                        <th colspan="2" style="text-align: right; border-left: 0; color: white;">
                            <?php echo COMPANY_NAME;?><br>
                            <?php echo COMPANY_EMAIL;?><br>
                            <?php echo COMPANY_ADDRESS;?> - <?php echo COMPANY_POSTALCODE;?><br>
                            <?php echo COMPANY_TOWN;?> <br>
                            <?php echo COMPANY_PHYSICAL_ADDRESS;?><br>
                        </th>	
								      </tr>
                      <tr> 
                        <td nowrap="nowrap" colspan="5" style="text-align: left;"><b>Loan Breakdown Calculation - <?php echo $loan_type;?></b></td> 
									    </tr>
                      </thead>
                </table>
                <table  class="table table-bordered"  style="width:100%"> 
                  <thead>
										  <tr> 
                        <th nowrap="nowrap" style="text-align: center;">Month</th> 
                        <th style="text-align: center;">EMI</th>
                        <th style="text-align: center;">Interest</th>
                        <th style="text-align: center;">Principal</th>
                        <th style="text-align: center;">Loan Balance</th>
									    </tr>
                </thead>
								<tbody>
                            <tr class="active">
                                <th nowrap="nowrap" style="text-align: center;">0</th>
                                <td nowrap="nowrap" style="text-align: right;">&nbsp;</td>
                                <td nowrap="nowrap" style="text-align: right;">&nbsp;</td>
                                <td nowrap="nowrap" style="text-align: right;">&nbsp;</td>
                                <td nowrap="nowrap" style="text-align: right;"><?php  echo (number_format($loan_principal,2));?></td>
                            </tr>
								<?php
                            $interest_breakdown =   loan_calculator_reducingbalance($loan_principal, $period, $loan_rate );
                            $monthly_emi        =   calcPayment($loan_principal, $period, $loan_rate );
                            $loan_balance = $loan_principal;
                            $total_interest = 0;
                            $total_principal = 0;
                            for ($i=0; $i < count($interest_breakdown) ; $i++) { 
                                $interest_amount = $interest_breakdown[$i];
                                $principal = $monthly_emi-$interest_amount;
                                $loan_balance = $loan_balance - $principal;
                                $total_interest += $interest_amount;
                                $total_principal +=  $principal;
                                    ?>
                                        <tr class="active">
                                            <th nowrap="nowrap" style="text-align: center;"><?php echo htmlentities($i+1);?></th>
                                            <td nowrap="nowrap" style="text-align: right;"><?php  echo (number_format($monthly_emi,2));?></td>
                                            <td nowrap="nowrap" style="text-align: right;"><?php  echo (number_format($interest_amount,2));?></td>
                                            <td nowrap="nowrap" style="text-align: right;"><?php  echo (number_format($principal,2));?></td>
                                            <td nowrap="nowrap" style="text-align: right;"><?php  echo (number_format($loan_balance,2));?></td>
                                        </tr>
                                    <?php
                            }
                            ?>
                                </tbody>
                                <tfoot>
                                    <tr class="active">
                                        <th nowrap="nowrap" style="text-align: center;">Total:</th>
                                        <th nowrap="nowrap" style="text-align: right;">&nbsp;</th>
                                        <th nowrap="nowrap" style="text-align: right;"><?php  echo number_format($total_interest,2);?></th>
                                        <th nowrap="nowrap" style="text-align: right;"><?php  echo number_format($total_principal,2);?></th>
                                        <th nowrap="nowrap" style="text-align: right;"><?php  echo number_format(($total_principal+$total_interest),2);?></th>
                                    </tr>
                                </tfoot>
						</table> 
            <div id="other" class="ln_solid">
								<div class="form-group">
									<div class="col-md-6 offset-md-3">
										<button type='button' name="print"  OnClick="window.print();" class="btn btn-primary">Print</button>
										<button type='button' onclick="window.close();" class="btn btn-success">Close</button>
									</div>
								</div>
							</div>
            </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}
		}
	</script>
    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>
</html>
<?php }  ?>