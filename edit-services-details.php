<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } 
  else
  {
	if(isset($_POST['submit']))
	{

		$eid=$_GET['editid'];

		$sname 			=	$_POST['sname'];
		$scharge 			=	$_POST['scharge'];
		$rate_instalment 	=	$_POST['rate_instalment'];
		$pay_frequency		=	$_POST['pay_frequency'];
		
		$sql="update services set service_description=:sname,service_charge=:scharge,instalment_rate=:rate_instalment,payment_frequency=:pay_frequency where service_id=:eid";
		$query=$dbh->prepare($sql);
		$query->bindParam(':sname',$sname,PDO::PARAM_STR);
		$query->bindParam(':scharge',$scharge,PDO::PARAM_STR);
		$query->bindParam(':rate_instalment',$rate_instalment,PDO::PARAM_STR);
		$query->bindParam(':pay_frequency',$pay_frequency,PDO::PARAM_STR);
		$query->bindParam(':eid',$eid,PDO::PARAM_STR);
		$query->execute();

		$query->execute();
		echo '<script>alert("Service has been updated")</script>';

	}
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | Update Service</title>

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
										<span class="section">Update Service Details</span>	
										<?php
										$eid=$_GET['editid'];
										$sql="SELECT * from services where service_id=:eid";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':eid',$eid,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $row)
											{               
												?>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Service Name / Description<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="sname" value="<?php  echo $row->service_description;?>" placeholder="Service Name" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Service Charge <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="scharge" required='required' placeholder="Service charge(100)" value="<?php  echo $row->service_charge;?>"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Installment Rate<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="rate_instalment" required='required' placeholder="Installment Rate in percentage (10)" value="<?php  echo $row->instalment_rate;?>"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Payment Frequency<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="pay_frequency" required='required' placeholder="Frequency in Days e.g daily(1) after two days (2)" value="<?php  echo $row->payment_frequency;?>"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Creation Date<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="" value="<?php  echo $row->date_created;?>"  readonly='true'  required="required" />
													</div>
												</div>
												<?php $cnt=$cnt+1;}} ?>
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
