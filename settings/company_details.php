<?php
//ob_start();
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
//include('../php_functions/functions.php');
include('../session.php');
function audit_trail($dbh, $description, $member_id)
{
    // $username = get_membername_fromid($dbh, $member_id);
    $trail_date = date("Y-m-d H:i:s", time());
    //session_start();
    //$username = $_SESSION["username"];
    // $username = isset($_SESSION["username"]) ? $_SESSION["username"] : $username;
    $ip_addr = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    $status = 1;
    //$query = mysqli_query($dbh, "INSERT into audit_trail (trail_date, trail_desc, user_id, ip_addr trail_status) VALUES ('".$trail_date."','".$description."','".$member_id."','".$ip_addr."', '1')");
    $sql="insert into audit_trail(trail_date, trail_desc, user_id, ip_addr, trail_status)values(:date,:desc,:usrid,:ipadr,:status)";
    $query=$dbh->prepare($sql);
    $query->bindParam(':usrid', $member_id, PDO::PARAM_STR);
    $query->bindParam(':date', $trail_date, PDO::PARAM_STR);
    $query->bindParam(':desc', $description, PDO::PARAM_STR);
    $query->bindParam(':ipadr', $ip_addr, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
}
if (!CheckSession()) {
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
} else{
    $logged_inuser = $_SESSION['member_id'];
    $op = $_REQUEST['op'];
    //$eid=$_GET['editid'];
      if (isset($_POST['submit'])) {
        //$clientmsaid=$_SESSION['clientmsaid'];
            $member_id          =   1;
           // $mem_no           =   $_POST['mem_no'];
            $company_name       =   $_POST['company_name'];
            $company_tel        =   $_POST['company_tel'];
            $company_email      =   $_POST['company_email'];
            $address            =   $_POST['address'];
            $postal_code        =   $_POST['postal_code'];
            $town               =   $_POST['town'];
            $company_pin        =   $_POST['company_pin'];
            $physical_address   =   $_POST['physical_address'];
            $registration_date  =   date('Y-m-d',strtotime($_POST['registration_date']));

              $sql="UPDATE company_details set 
                            company_name=:company_name,
                            company_tel=:company_tel,
                            company_email=:company_email,
                            address=:address,
                            postal_code=:postal_code,
                            town=:town,
                            company_pin=:company_pin,
                            physical_address=:physical_address,
                            registration_date=:registration_date
              where id=:eid ";
              $query=$dbh->prepare($sql);        
              //$query->bindParam(':mem_no', $mem_no, PDO::PARAM_STR);
              $query->bindParam(':company_name', $company_name, PDO::PARAM_STR);
              $query->bindParam(':company_tel', $company_tel, PDO::PARAM_STR);
              $query->bindParam(':company_email', $company_email, PDO::PARAM_STR);
              $query->bindParam(':address', $address, PDO::PARAM_STR);
              $query->bindParam(':postal_code', $postal_code, PDO::PARAM_STR);
              $query->bindParam(':town', $town, PDO::PARAM_STR);
              $query->bindParam(':company_pin', $company_pin, PDO::PARAM_STR);
              $query->bindParam(':physical_address', $physical_address, PDO::PARAM_STR);
              $query->bindParam(':registration_date', $registration_date, PDO::PARAM_STR);
              $query->bindParam(':eid', $member_id, PDO::PARAM_STR);
              $query->execute();
              //$LastInsertId=$dbh->lastInsertId();
              $count = $query->rowCount();
              if ($count>0) {
                $audit_description = "Updated Company Details";
                 audit_trail($dbh, $audit_description, $logged_inuser);
                 // echo '<script>alert("Client has been added.")</script>';
                  echo "<script>window.location.href ='company_details.php?editid=$member_id&op=ok'</script>";
              } else {
                  echo "<script>window.location.href ='company_details.php?editid=$member_id&op=no'</script>";
              }
         // }
      } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Badili Sacco | Update Company Details</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../vendor/jquery_date_picker/css/jquery-ui.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form method="post" onsubmit="return ValidateForm()" novalidate>
                                    <?php
                                        $eid = 1;
										$sql="SELECT * from company_details where id=:eid";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':eid',$eid,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {
                                                ?>
                                                    <span class="section">Company Details</span>
                                                    <?php
                                                    if ($op=="ok") {
                                                        ?>
                                                        <div class="alert alert-success" role="alert">
                                                        Company Details Updated Successfully.
                                                        </div>
                                                    <?php
                                                    } elseif ($op == "no") {
                                                        ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            No changes Made / Error Occurred on Update try again!.
                                                        </div>
                                                    <?php
                                                    }
                                                ?>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Company Name<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="company_name" id="company_name" value="<?php echo $row->company_name ;?>" placeholder="First Name" required />
                                                    </div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tel Number <span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control number" type="number"  name="company_tel" id="company_tel" value="<?php echo $row->company_tel ;?>" required='required' placeholder="Phone Number"></div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Address<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control email" type="email" name="company_email" id="company_email" value="<?php echo $row->company_email;?>" required  /></div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Company PIN<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="company_pin" id="company_pin" value="<?php echo $row->company_pin ;?>" placeholder="Enter PIN" required />
                                                    </div>
                                                </div>


                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Postal Address<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="address" id="address" value="<?php echo $row->address;?>" placeholder="Address" required />
                                                    </div>
                                                </div>
                                                
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Postal Code<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="postal_code" id="postal_code" value="<?php echo $row->postal_code;?>" placeholder="Postal Code" required />
                                                    </div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Town<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="town" id="town" value="<?php echo $row->town;?>" placeholder="Town" required />
                                                    </div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Physical Address<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <textarea name='physical_address' id="physical_address" placeholder="Physical Address" rows="4" cols="10"><?php echo htmlspecialchars($row->physical_address);?></textarea></div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Registration Date</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="registration_date" id="registration_date" value="<?php echo date('d-m-Y',strtotime($row->registration_date ));?>" placeholder="Enter Company Registration Date" required />
                                                    </div>
                                                </div>
                                                <div class="ln_solid">
                                                    <div class="form-group">
                                                        <div class="col-md-6 offset-md-3">
                                                            <button type='submit' name="submit" class="btn btn-primary" onclick="refreshmain_window()">Update</button>
                                                            <button type='reset' class="btn btn-success">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }
                                        ?>
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
    <script type="text/javascript">
        function ValidateForm() {
            var company_name = document.getElementById("company_name").value;
            if (company_name=="") {
                alert("Fill in the Company Name");
                return false;
            }
            var company_tel = document.getElementById("company_tel").value;
            if (company_tel=="") {
                alert("Fill in the Telephone number.");
                return false;
            }
            var company_email = document.getElementById("company_email").value;
            if (company_email=="") {
                alert("Fill in the Email Address.");
                return false;
            }
            var address = document.getElementById("address").value;
            if (address=="") {
                alert("Fill in the postal address.");
                return false;
            }
            var postal_code = document.getElementById("postal_code").value;
            if (postal_code=="") {
                alert("Fill in the Postal Code");
                return false;
            }
            var town = document.getElementById("town").value;
            if (town=="") {
                alert("Fill in the Company Town.");
                return false;
            }
            var company_pin = document.getElementById("company_pin").value;
            if (company_pin=="") {
                alert("Fill in the Company PIN.");
                return false;
            }
            var physical_address = document.getElementById("physical_address").value;
            if (physical_address=="") {
                alert("Fill in the Company Physical Address.");
                return false;
            }
            var registration_date = document.getElementById("registration_date").value;
            if (registration_date=="") {
                alert("Fill in the Company Registration Date.");
                return false;
            }
            return true;
        }
        function refreshmain_window()
        {
            window.onunload = function()
            {
                window.opener.location.reload();
            };
        }
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

    <script src="../vendor/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../vendor/jquery_date_picker/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#registration_date" ).datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            });
        })
    </script>
</body>
</html>
<?php
}
 ?>
