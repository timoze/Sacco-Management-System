<?php
ob_start();
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) {
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
  } else{
    $logged_inuser = $_SESSION['member_id'];
    $user_department = get_user_departmentfrom_id($dbh, $logged_inuser);
    //print $user_department;
    $department_name = get_user_department($dbh, $department_id);
  	$com_nam = $company_name;
  	?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Badili Sacco | Contribution Details </title>
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
			<?php
				$contributon_id=intval($_GET['contribution_id']);
				$contribution_details = contribution_details_from_id($dbh, $contributon_id);

                $logo = '../' . LOGO;



                $sql="SELECT * from member_contribution_main where id=:eid";
                $query = $dbh -> prepare($sql);
                $query->bindParam(':eid', $contributon_id, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $rw) {
                        $contribution_amount = $rw->contribution_amount;
                        $contribution_date =  $rw->contribution_date;
                        $member_id = $rw->member_id;
                       // $payment_type = $rw->payment_type;
                        $txn_id = $rw->txn_id;
                        $loan_id = $rw->loan_id;
                        $date_created = $rw->date_created;
                        $created_by = $rw->created_by;
                        $rcpt_no = $rw->rcpt_no;

                        $contrib_amt_query    =   mysqli_query($connection, "SELECT id,contribution_amount,payment_type from member_contribution where contrib_id='$contributon_id' and status='1' ");
                        $cntrn_items_array = array();
                    $total_amnt = 0;
                        while ($row = mysqli_fetch_assoc($contrib_amt_query)) {
                            $contrbtn_val_id = $row['id'];
                            $contrbtn_contribution_amount = $row['contribution_amount'];
                            $contrbtn_payment_type = $row['payment_type'];
                            $cntrn_items_array[] = array($contrbtn_val_id, $contrbtn_payment_type, $contrbtn_contribution_amount);
                            $total_amnt += $contrbtn_contribution_amount;
                        }
                    }
                }









			?>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="x_panel">
						<div class="x_content">
							<table  width="100%" border="0"> 
								<tr bgcolor="#5c0e1e">
									<th colspan="2" style="text-align: left;"><img src="<?php echo $logo;?>" width="200" height="80"></th>	
                                    <th  style="text-align: right; color: white;">
                                        <?php echo COMPANY_NAME;?><br>
                                        <?php echo COMPANY_EMAIL;?><br>
                                        <?php echo COMPANY_ADDRESS;?> - <?php echo COMPANY_POSTALCODE;?><br>
                                        <?php echo COMPANY_TOWN;?> <br>
                                        <?php echo COMPANY_PHYSICAL_ADDRESS;?><br>
                                    </th>	
								</tr>

                                <tr>
									<td nowrap style="text-align: left;" width="100%" colspan="3">&nbsp;</td>	
								</tr>

                                <tr>
									<td colspan="2"><B><font color="red" size=4>Contribution Details</font></B></td>	
                                    <td style="text-align: right;"> 
                                        <b>Doc. No.:</b><font ><?php echo $rcpt_no;?></font><br>
                                        <b>Date :</b> <?php echo date("d/m/Y",strtotime($contribution_date));?>
                                    </td>	
								</tr>

                                <tr>
									<td nowrap style="text-align: left;" width="100%" colspan="3">&nbsp;</td>	
								</tr>

                                <tr>
									<td nowrap width="30%" style="text-align: left;"><B><font>Received From:</font></B></td>	
                                    <td colspan="2" width="70%" style="text-align: left;"><?php echo get_membername_fromid($dbh,$member_id);?></td>
								</tr>

                                <tr>
									<td nowrap style="text-align: left;" width="100%" colspan="3">&nbsp;</td>	
								</tr>

                                <tr>
									<td nowrap width="30%" style="text-align: left;"><B><font>Amount in words :</font></B></td>	
                                    <td colspan="2" width="70%" style="text-align: left;"><?php echo convert_number($total_amnt);?></td>
								</tr>

                                <tr>
									<td nowrap style="text-align: left;" width="100%" colspan="3">&nbsp;</td>	
								</tr>

                                <tr>
									<td nowrap  width="30%" style="text-align: left;"><B><font>Amount (KES):</font></B></td>	
                                    <td colspan="2" width="70%" style="text-align: left;"><?php echo number_format($total_amnt,2);?></td>
								</tr>

                                <tr>
									<td nowrap style="text-align: left;" width="100%" colspan="3">&nbsp;</td>	
								</tr>

                                <tr>
									<td nowrap  width="30%" style="text-align: left;"><B><font>Transaction Code:</font></B></td>	
                                    <td colspan="2" width="70%" style="text-align: left;"><?php echo $txn_id;?></td>
								</tr>

                                <tr>
									<td nowrap style="text-align: left;" width="100%" colspan="3">&nbsp;</td>	
								</tr>

                                <tr>
									<td nowrap style="text-align: left;" colspan="3"><B><font>Being Payment For:</font></B></td>	
                                   
								</tr>

                                <tr>
									<td nowrap style="text-align: left;" width="100%" colspan="3">&nbsp;</td>	
								</tr>




                                <tr>
                                    <td colspan="3" width="100%">
                                        <table width="100%" border="1">
                                            
                                            <?php
                                              
                                                   
                                                    ?>
                                                        
                                                        <tr bgcolor="#5c0e1e">
                                                            <th style="text-align: center; color: white;"  width="5%">#</th>
                                                            <th style="text-align: center; color: white;"  width="70%">Item</th>	
                                                            <th style="text-align: center; color: white;" width="30%">Amount</th>	
                                                            	
                                                        </tr>
                                                    <?php
                                                    $total_item_amount = 0;
                                                    for ($items_count=0; $items_count <count($cntrn_items_array) ; $items_count++) {
                                                        $contrib_id            = $cntrn_items_array[$items_count][0];
                                                        $contrib_amount        = $cntrn_items_array[$items_count][2];
                                                        $contrib_item          = $cntrn_items_array[$items_count][1];
                                          
                                                       
                                                          ?>
                                                            <tr>
                                                                <td style="text-align: center;" width="5%">
                                                                    <?php echo ($items_count+1);?>
                                                                </td>
                                                                <td width="70%">
                                                                    <?php echo get_payment_type_from_id($dbh,$contrib_item);?>
                                                                </td>
                                                               
                                                                <td style="text-align: right;" width="30%">
                                                                    <?php echo number_format($contrib_amount,2);?>
                                                                </td>
                                                                
                                                            </tr>
                                                          <?php
                                                        $total_item_amount += $contrib_amount;
                                                    }
                                                    ?>
                                                            <tr bgcolor="#5c0e1e">
                                                               
                                                                <th style="text-align: right; color: white;" colspan="2" width="70%">
                                                                    Total:
                                                                </th>
                                                                <th style="text-align: right; color: white;" width="30%">
                                                                    <?php echo number_format($total_item_amount,2);?>
                                                                </th>
                                                                
                                                            </tr>
                                                          
                                        </table>
                                    </td>
								</tr>



                                
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