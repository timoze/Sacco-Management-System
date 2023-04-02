<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } 
  else
  {
    if(isset($_POST['submit']))
	{

		$sname 			=	$_POST['sname'];
		$scharge 			=	$_POST['scharge'];
		$rate_instalment 	=	$_POST['rate_instalment'];
		$pay_frequency		=	$_POST['pay_frequency'];

		$date_created 		=	date("Y-m-d H:i:s");
	
	
		$sql="insert into services(service_description,service_charge, instalment_rate, payment_frequency, date_created) values(:sname,:scharge, :rate_instalment,:pay_frequency,:date_created)";
		$query=$dbh->prepare($sql);
		$query->bindParam(':sname',$sname,PDO::PARAM_STR);
		$query->bindParam(':scharge',$scharge,PDO::PARAM_STR);
		$query->bindParam(':rate_instalment',$rate_instalment,PDO::PARAM_STR);
		$query->bindParam(':pay_frequency',$pay_frequency,PDO::PARAM_STR);
		$query->bindParam(':date_created',$date_created,PDO::PARAM_STR);
		$query->execute();

		$LastInsertId=$dbh->lastInsertId();
		if ($LastInsertId>0) {
			echo '<script>alert("Service has been added.")</script>';
			echo "<script>window.location.href ='add-services.php'</script>";
		}
		else
		{
			echo '<script>alert("Something Went Wrong. Please try again")</script>';
		}  
	}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | Add Services</title>

	<!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">

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
                                    <form method="post" novalidate>                                        
                                        <span class="section">Add Service</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Service Name / Description<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="sname" placeholder="Service Name" required='required' value="">
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Service Charge<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="scharge"  placeholder="Service charge(100)" required='required' value="">
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Installment Rate<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="rate_instalment"  placeholder="Installment Rate in percentage (10)" required='required' value="">
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Payment Frequency<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="pay_frequency"  placeholder="Frequency in Days e.g daily(1) after two days (2)" required='required' value="">
											</div>
										</div>
										<div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
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

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
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
