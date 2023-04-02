<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('./php_functions/functions.php');
include('./session.php');
if (!CheckSession()) {
	header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
  } else{
	$logged_inuser = $_SESSION['member_id'];
    $user_department = get_user_departmentfrom_id($dbh, $logged_inuser);
    //print $user_department;
    $department_name = get_user_department($dbh, $department_id);
    if (isset($_POST['submit'])) {
        $adminid=$_SESSION['clientmsaid'];
        $AName=$_POST['adminname'];
        $mobno=$_POST['mobilenumber'];
        $email=$_POST['email'];
        $sql="UPDATE tbladmin set AdminName=:adminname,MobileNumber=:mobilenumber,Email=:email where ID=:aid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':adminname', $AName, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':mobilenumber', $mobno, PDO::PARAM_STR);
        $query->bindParam(':aid', $adminid, PDO::PARAM_STR);
        $query->execute();

        echo '<script>alert("Your profile has been updated")</script>';
        echo "<script>window.location.href ='admin-profile.php'</script>";
    }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | User Profile</title>

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
										<span class="section">User Profile</span>	
									<?php
										$admid=$_SESSION['clientmsaid'];
										$sql="SELECT * from  tbladmin where ID=:aid ";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':aid', $admid, PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if ($query->rowCount() > 0) {
											foreach ($results as $row) {               
												?>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="adminname" value="<?php  echo $row->AdminName;?>" placeholder="User fullnames" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="username" value="<?php  echo $row->UserName;?>" placeholder="Login username" required="required" readonly />
													</div>
												</div>
												
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Phone Number<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="mobilenumber" required='required' placeholder="Phone number"  maxlength='10' pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Email address<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="email" name="email"  value="<?php  echo $row->Email;?>" placeholder="User Email" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Date Registered<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="" value="<?php  echo $row->AdminRegdate;?>"  readonly='true'  required="required" />
													</div>
												</div>
											<?php $cnt=$cnt+1;
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
