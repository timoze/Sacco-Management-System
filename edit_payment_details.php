<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['id'];

 $repayment_date=date('Y-m-d', strtotime($_POST['repayment_date']));
 $installment_amount=$_POST['installment_amount'];
 
$sql="update invoice_items set repayment_date=:repayment_date,amount=:repayment_amount where id=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':repayment_date',$repayment_date,PDO::PARAM_STR);
$query->bindParam(':repayment_amount',$installment_amount,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);

$query->execute();
echo '<script>alert("Payment details has been updated")</script>';
echo "<script type='text/javascript'> document.location ='edit_payment_details.php?id=$eid'; </script>";
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | Update Payment Details</title>

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
										<span class="section">Update Payment Details</span>	
										<?php
											$eid=$_GET['id'];
											$sql="SELECT * from invoice_items where id=:eid";
											$query = $dbh -> prepare($sql);
											$query->bindParam(':eid',$eid,PDO::PARAM_STR);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if ($query->rowCount() > 0) {
												foreach ($results as $row) {
													//$repaymentdate = date("m/d/Y", $row->repayment_date ) ;?>								
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Repayment Date<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control datepick2" name="repayment_date" value="<?php echo date('d-m-Y', strtotime($row->repayment_date));?>" required="required" />
													</div>
												</div>

												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Instalment Amount <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="installment_amount" required='required' placeholder="Instalment Amount" value="<?php  echo $row->amount;?>"></div>
												</div>

												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Amount Paid</label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="amount_paid" placeholder="Amount Paid" value="<?php  echo $row->amount_paid;?>" readonly></div>
												</div>

												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Date Paid </label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="date_paid" value="<?php  echo date('d-m-Y', strtotime($row->date_paid));?>"  readonly='true' readonly />
													</div>
												</div>

												
												<?php $cnt=$cnt+1;
												}
											}
										?>
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