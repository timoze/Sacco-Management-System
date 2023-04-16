<?php
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
    $loan_id            =   $_REQUEST['loan_id'];
    $loan_details_array =   loan_details_fromloanid($dbh, $loan_id);
    $loan_rate          =   INTEREST_RATE;
    $period             =   $loan_details_array[0][7];
    $loan_principal     =   $loan_details_array[0][4];
    //disb_date
    $disbdatequery = mysqli_fetch_assoc(mysqli_query($connection,"SELECT contribution_date from member_contribution where loan_id='$loan_id' and cr_dr='C' and status=1"));
    $disb_date_val = $disbdatequery['contribution_date'];
    $logo = '../' . LOGO;
    //$loan_type = LOAN_FORMULA;
    if (LOAN_FORMULA=='1') {
        $loan_type = "Reducing Balance";
    }else{
        $loan_type = "Flat Rate";
    }
    if (isset($_POST['update'])) {
        //update repayment period
        $disb_date 			    =	date("Y-m-d",strtotime($_POST['disb_date']));
        $repay_period 			=	$_POST['repay_period'];
        $loan_id_post                =   $_POST['loan_id_post'];
        $repayment_start_date = date('Y-m-d', strtotime($disb_date . ' + ' . GRACE_PERIOD . ' days'));

        $loan_details_array =   loan_details_fromloanid($dbh, $loan_id_post);
        $interest_breakdown =   loan_calculator_reducingbalance( $loan_details_array[0][4], $repay_period, $loan_details_array[0][12] );
        $monthly_emi        =   calcPayment($loan_details_array[0][4], $repay_period, $loan_details_array[0][12] );

        //get all the current schedules
        $current_loan_schedules = get_loan_schedule_data($loan_id_post);
       // print_r($current_loan_schedules);

        $cr_dr = "C";
        $sqlmbr_contrbtn="UPDATE member_contribution SET contribution_date=:invoice_date WHERE loan_id=:loan_id AND cr_dr=:cr_dr";
        $query_mbr_contrbtn=$dbh->prepare($sqlmbr_contrbtn);
        $query_mbr_contrbtn->bindParam(':invoice_date',$disb_date,PDO::PARAM_STR);
        $query_mbr_contrbtn->bindParam(':cr_dr',$cr_dr,PDO::PARAM_STR);
        $query_mbr_contrbtn->bindParam(':loan_id',$loan_id_post,PDO::PARAM_STR);
        $query_mbr_contrbtn->execute();

        for ($i=0; $i < ($repay_period) ; $i++) {
            $date_due = date('Y-m-d', strtotime($repayment_start_date . ' + ' . ($i+1) . ' months'));
            $insert_id = $current_loan_schedules[$i][0];
            if ($insert_id>=1) {
                //UPDATE
                $sql=" UPDATE  loan_schedule SET date_due=:date_due,amount=:amount WHERE id=:eid ";
                $query=$dbh->prepare($sql);
                $query->bindParam(':date_due',$date_due,PDO::PARAM_STR);
                $query->bindParam(':amount',$monthly_emi,PDO::PARAM_STR);
                $query->bindParam(':eid',$insert_id,PDO::PARAM_STR);
                $query->execute();

            }else{
                //INSERT
                //echo $date_due;
                $sqlschedule="INSERT into loan_schedule(loan_id,date_due, amount) values(:loan_id,:date_due,:amount)";
                $queryschedule=$dbh->prepare($sqlschedule);
                $queryschedule->bindParam(':loan_id',$loan_id_post,PDO::PARAM_STR);
                $queryschedule->bindParam(':date_due',$date_due,PDO::PARAM_STR);
                $queryschedule->bindParam(':amount',$monthly_emi,PDO::PARAM_STR);
                $queryschedule->execute();    
            }
            
        }
        echo "<script>window.location.href ='print_loan_schedule.php?loan_id=$loan_id_post'</script>";

        
  
    }
  	?>
<!DOCTYPE HTML>
<html>
<head>
	  <title>Badili Sacco | Loan Repayment Schedule</title>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->

       <!-- jQuery -->
       <link href="../vendor/jquery_date_picker/css/jquery-ui.css" rel="stylesheet">
    
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
                                <td nowrap="nowrap" colspan="5" style="text-align: left;"><b>Loan Repayment Schedule - <?php echo $loan_type;?> at (<?php echo INTEREST_RATE;?>)</b></td> 
                            </tr>
                            <?php
                            if ($user_department=='5') {
                                ?>
                                    <form method="post" >
                                        <tr> 
                                            <td nowrap="nowrap" style="text-align: left;"><b>Disbursement Date</b></td> 
                                            <td nowrap="nowrap" style="text-align: left;"><input type="text" value="<?php echo date('d-m-Y',strtotime($disb_date_val));?>" name="disb_date" id="disb_date" width="10"></td> 
                                            <td nowrap="nowrap" style="text-align: left;"><b>Repayment Period</b></td> 
                                            <td nowrap="nowrap" style="text-align: left;"><input type="number" value="<?php echo ($loan_details_array[0][7]);?>" name="repay_period" id="repay_period" width="10" readonly="readonly"></td> 
                                            <td nowrap="nowrap" style="text-align: left;">
                                                <input type="hidden" value="<?php echo $loan_id;?>" name="loan_id_post" id="loan_id_post">
                                            
                                                <input type="submit" class="btn btn-primary" name="update" id="update"  value="Update" width="10">
                                            </td> 
                                        </tr>
                                    </form>
                                <?php
                            }
                            else {
                                ?>
                                    <tr> 
                                        <td nowrap="nowrap" style="text-align: left;"><b>Disbursement Date</b></td> 
                                        <td nowrap="nowrap" style="text-align: left;"><?php echo date("d-m-Y",strtotime($disb_date_val));?></td> 
                                        <td nowrap="nowrap" style="text-align: left;"><b>Repayment Period</b></td> 
                                        <td nowrap="nowrap" style="text-align: left;"><?php echo ($loan_details_array[0][7]);?></td> 
                                        <td nowrap="nowrap" style="text-align: left;">&nbsp;</td> 
                                    </tr>
                                <?php 
                            }
                            ?>
                            <tr> 
                                <td nowrap="nowrap" style="text-align: left;"><b>Loan Amount</b></td> 
                                <td nowrap="nowrap" style="text-align: left;"><?php echo number_format($loan_details_array[0][4],2);?></td> 
                                <td nowrap="nowrap" style="text-align: left;"><b>Total Repayment</b></td> 
                                <td nowrap="nowrap" style="text-align: left;"><?php echo number_format($loan_details_array[0][5],2);?></td> 
                                <td nowrap="nowrap" style="text-align: left;"><b>Interest : </b><?php echo number_format(($loan_details_array[0][5]-$loan_details_array[0][4]),2);?> </td> 
                            </tr>
                        </thead>
                    </table>
                    <table  class="table table-bordered"  style="width:100%"> 
                        <thead>
							<tr> 
                                <th style="text-align: center;">#</th>
                                <th nowrap="nowrap" style="text-align: center;">Date Due</th> 
                                <th style="text-align: center;">Amount</th>
                                <th style="text-align: center;">Amount Paid</th>
                                <th style="text-align: center;">Balance</th>
							</tr>
                        </thead>
						<tbody>
							<?php
                                $staus = "1";
                                $sql="SELECT id,loan_id,date_due, amount ,amount_paid,date_paid,status from  loan_schedule where loan_id=:eid  order by date_due ASC";
                                $query = $dbh -> prepare($sql);
                                //$query->bindParam(':staus',$staus,PDO::PARAM_STR);
                                $query->bindParam(':eid',$loan_id,PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=0;
                                $total_loan_amount      =   0;
                                $total_payment_amount   =   0;
                               // $total_interest           =   0;
                                //if ($query->rowCount() > 0) {
                                $start_date1 = $loan_details_array[0][3];
                                $member_id =  $loan_details_array[0][1];
                                $start_date_array = array();
                                $cnt = 0;
                                foreach ($results as $row) {
                                    $id             =   $row->id ;
                                    $date_due       =   $row->date_due;
                                    $amount         =   $row->amount;
                                    //$amount_paid    =   $row->amount_paid;
                                    $date_paid      =   $row->date_paid;
                                    
                                    $total_loan_amount += $amount;
                                    $total_payment_amount += $amount_paid;
                                    $start_date_array[] = $date_due;
                                    $end_date = $date_due;
                                    if ($cnt == '0') {
                                        $start_date = $start_date1;
                                    }else {
                                        $start_date = date('Y-m-d', strtotime($date_due . ' - 1 months'));
                                    }
                                   // print $start_date . "------->>>>>>>" . $end_date . "<br>";
                                    
                                   // $date_due = date('Y-m-d', strtotime($repayment_start_date . ' + ' . $i . ' months'));
                                    $amount_paid = member_loan_payments_period($member_id, $loan_id, $start_date, $end_date);
                                    $bal = $amount - $amount_paid;
                                    ?>
                                        <tr class="active">
                                            <th nowrap="nowrap" style="text-align: center;"><?php echo htmlentities($cnt+1);?></th>
                                            <td nowrap="nowrap" style="text-align: center;"><?php  echo date('d-m-Y',strtotime($date_due));?></td>
                                            <td nowrap="nowrap" style="text-align: right;"><?php  echo (number_format($amount,2));?></td>
                                            <td nowrap="nowrap" style="text-align: right;"><?php  echo (number_format($amount_paid,2));?></td>
                                            <td nowrap="nowrap" style="text-align: right;"><?php  echo (number_format($bal,2));?></td>
                                        </tr>
                                    <?php
                                    
                                    $cnt++;
                                }
                            ?>
                                </tbody>
                                <tfoot>
                                    <tr class="active">
                                        <th nowrap="nowrap" style="text-align: right;">&nbsp;</th>
                                        <th nowrap="nowrap" style="text-align: center;">Total:</th>
                                        <th nowrap="nowrap" style="text-align: right;"><?php  echo number_format($total_loan_amount,2);?></th>
                                        <th nowrap="nowrap" style="text-align: right;"><?php  echo number_format($total_payment_amount,2);?></th>
                                        <th nowrap="nowrap" style="text-align: right;"><?php  echo number_format(($total_loan_amount-$total_payment_amount),2);?></th>
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
        function refreshmain_window()
        {
            window.onunload = function()
            {
                window.opener.location.reload();
            };
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
    <script src="../vendor/jquery_date_picker/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#disb_date" ).datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            });
        })
    </script>
</body>
</html>
<?php }  ?>