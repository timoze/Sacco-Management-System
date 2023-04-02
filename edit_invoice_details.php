<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
	if(isset($_POST['submit']))
	{
		$eid=$_REQUEST['editid'];
		$client_id 				=	$_POST['client_id'];
		$amount 				=	$_POST['amount'];
		$repayment_amount		=	$_POST['repayment_amount'];
		$scharge 				=	$_POST['scharge'];
		//$repayment_startdate	=	date("Y-m-d", strtotime($_POST['repayment_startdate']));
		//$invoice_date 			=	date("Y-m-d", strtotime($_POST['invoice_date']));
		$repayment_startdate = date('Y-m-d', strtotime($_POST['repayment_startdate']));
		//$rep_m = $repayment_stat_arr[1];
		//$rep_d = $repayment_stat_arr[0];
		//$rep_y = $repayment_stat_arr[2];
		$invoice_date = date('Y-m-d', strtotime($_POST['invoice_date']));
		//$inv_m = $invoice_date_arr[1];
		//$inv_d = $invoice_date_arr[0];
		//$inv_y = $invoice_date_arr[2];
		//$invoice_date	=	date("$inv_y-$inv_m-$inv_d");
		// $repayment_startdate	=	date("$rep_y-$rep_m-$rep_d");

		$sql="UPDATE invoices SET client_id=:client_id,amount=:amount,repayment_amount=:repayment_amount,repayment_startdate=:repayment_startdate,invoice_date=:invoice_date,service_charge=:service_charge WHERE invoice_id=:eid";
		$query=$dbh->prepare($sql);
		$query->bindParam(':client_id',$client_id,PDO::PARAM_STR);
		$query->bindParam(':amount',$amount,PDO::PARAM_STR);
		$query->bindParam(':repayment_amount',$repayment_amount,PDO::PARAM_STR);
		$query->bindParam(':repayment_startdate',$repayment_startdate,PDO::PARAM_STR);
		$query->bindParam(':invoice_date',$invoice_date,PDO::PARAM_STR);
		$query->bindParam(':eid',$eid,PDO::PARAM_STR);
		$query->bindParam(':service_charge',$scharge,PDO::PARAM_STR);

		$query->execute();

		echo '<script>alert("Invoice has been updated added.")</script>';
		echo "<script>window.location.href ='edit_invoice_details.php?editid=$eid'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Santalink | Update Invoice</title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	 <link href="./vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="./vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
									<form method="post"> 
										<p>Update Invoice Details </p>

										<?php
										$eid=$_GET['editid'];
										$sql="SELECT * from invoices where invoice_id=:eid";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':eid',$eid,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $rw)
											{               
												?>
												<span class="section">Update Invoice</span>			
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Invoice Date<span class="required">*</span></label>
														<div class="col-md-6 col-sm-6">
															<input class="form-control datepick" name="invoice_date" value="<?php echo date('d-m-Y', strtotime($rw->invoice_date));?>" required="required" />
														</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Client<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<select name="client_id" id="client_id" placeholder="Select Client ..." class="form-control client_id" required='true'>
															<option value=""></option>
															<?php
																$staus = "1";
																$sqclients="SELECT ContactName, ID from tblclient where status=:staus";
																$query_clients = $dbh -> prepare($sqclients);
																$query_clients->bindParam(':staus',$staus,PDO::PARAM_STR);
																$query_clients->execute();
																$result_clients=$query_clients->fetchAll(PDO::FETCH_OBJ);
																$cnt=1;
																if($query_clients->rowCount() > 0)
																{
																	foreach($result_clients as $row_clients)
																	{  ?>
																		<option value="<?php  echo $row_clients->ID;?>"<?php if($rw->client_id==$row_clients->ID) echo "selected";?>><?php  echo $row_clients->ContactName;?></option>
																	
																		<?php 
																		$cnt=$cnt+1;
																	}
																} 
															?>
														</select>  
													</div>
												</div>										
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Service Charge <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="scharge" required='required' value="<?php  echo $rw->service_charge;?>"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Amount Given <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="amount" required='required' value="<?php  echo $rw->amount;?>"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Amount to Be Paid <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="repayment_amount" required='required' value="<?php  echo $rw->repayment_amount;?>"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Repayment Start Date<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control datepick2" name="repayment_startdate" value="<?php echo date('d-m-Y', strtotime($rw->repayment_startdate));?>" required="required" />
													</div>
												</div>
												<input type="hidden" name="editid" value="<?php echo $eid;?>">
												<?php 
											}
										} ?>
		
		
										<div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary">Update</button>
                                                    <button type='button' onclick="window.open('', '_self', ''); window.close();" class="btn btn-success">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
	 								</form> 
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
    <script src="./vendors/validator/multifield.js"></script>
    <script src="./vendors/validator/validator.js"></script>
    
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
    <script src="./vendors/jquery/dist/jquery-3.5.0.min.js"></script>
	<script src="./vendors/jquery/dist/jquery-ui.js"></script>
	<link href="./vendors/jquery/dist/jquery-ui.css" rel='stylesheet' type='text/css' />
	
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="./vendors/validator/validator.js"></script> -->
	<!-- bootstrap-daterangepicker -->
    <script src="./vendors/moment/min/moment.min.js"></script>
    <script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-daterangepicker -->
    <link href="./vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- bootstrap-datetimepicker -->    
    <script src="./vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>

	<!-- Initialize datetimepicker -->
	<script  type="text/javascript">
	$( function() {
				$(".datepick" ).datepicker({ dateFormat: 'dd-mm-yy'
				});
				$(".datepick2" ).datepicker({ dateFormat: 'dd-mm-yy'
				});
			});
	</script>

</body>

</html>
<?php
  }
 ?>
