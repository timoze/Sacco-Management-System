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
    $op = $_REQUEST['op'];
    $eid=$_GET['editid'];
      if (isset($_POST['submit'])) {
        //$clientmsaid=$_SESSION['clientmsaid'];
            $member_id        =   $_POST['member_id'];
           // $mem_no           =   $_POST['mem_no'];
            $fname            =   $_POST['fname'];
            $lname            =   $_POST['lname'];
            $national_id      =   $_POST['national_id'];
            $pin_no           =   $_POST['pin_no'];
            $phnumber         =   $_POST['phnumber'];
            $email            =   $_POST['email'];
            $password         =   md5($_POST['password']);
            $physical_address =   $_POST['physical_address'];
           // $id_document      =   $_POST['id_document'];
            $user_department  =   $_POST['user_department'];
              $sql="update users set first_name=:fname,last_name=:lname,id_no=:national_id,kra_pin=:kra_pin,physical_address=:physical_address,email=:email,phone_no=:phnumber,user_department=:user_department where member_id=:eid ";
              $query=$dbh->prepare($sql);        
              //$query->bindParam(':mem_no', $mem_no, PDO::PARAM_STR);
              $query->bindParam(':fname', $fname, PDO::PARAM_STR);
              $query->bindParam(':lname', $lname, PDO::PARAM_STR);
              $query->bindParam(':national_id', $national_id, PDO::PARAM_STR);
              $query->bindParam(':kra_pin', $pin_no, PDO::PARAM_STR);
              $query->bindParam(':physical_address', $physical_address, PDO::PARAM_STR);
              $query->bindParam(':email', $email, PDO::PARAM_STR);
              $query->bindParam(':phnumber', $phnumber, PDO::PARAM_STR);
              $query->bindParam(':user_department', $user_department, PDO::PARAM_STR);
              $query->bindParam(':eid', $member_id, PDO::PARAM_STR);
              $query->execute();
              //$LastInsertId=$dbh->lastInsertId();
              $count = $query->rowCount();
              if ($count>0) {
                $audit_description = "Updated Member details for (" . $fname ." ".$lname .")";
                 audit_trail($dbh, $audit_description, $logged_inuser);
                 // echo '<script>alert("Client has been added.")</script>';
                  echo "<script>window.location.href ='edit_user_details.php?editid=$member_id&op=ok'</script>";
              } else {
                  echo "<script>window.location.href ='edit_user_details.php?editid=$member_id&op=no'</script>";
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
    <title>Badili Sacco | update Member Details</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
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
										$sql="SELECT * from users where member_id=:eid";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':eid',$eid,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {
                                                ?>
                                                    <span class="section">Member Registration Form</span>
                                                    <?php
                                                    if ($op=="ok") {
                                                        ?>
                                                        <div class="alert alert-success" role="alert">
                                                            Member Details Updated Successfully.
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
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">First Name<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="fname" id="fname" value="<?php echo $row->first_name ;?>" placeholder="First Name" required />
                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Last Name<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="lname" id="lname" value="<?php echo $row->last_name ;?>" placeholder="Last Name / Surname" required />
                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">ID / Passport No.<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="national_id" id="national_id" value="<?php echo $row->id_no ;?>" placeholder="Enter Member National ID / Passport" required />
                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">KRA PIN No.</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control" name="pin_no" id="pin_no" value="<?php echo $row->kra_pin ;?>" placeholder="Enter Member KRA PIN No." required />
                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Phone Number <span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control number" type="number"  name="phnumber" id="phnumber" value="<?php echo $row->phone_no ;?>" required='required' placeholder="Phone Number"></div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Address<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control email" type="email" name="email" id="email" value="<?php echo $row->email ;?>" required  /></div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Physical Address<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <textarea name='physical_address' id="physical_address" placeholder="Physical Address" rows="4" cols="10"><?php echo htmlspecialchars($row->physical_address);?></textarea></div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Department<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <select name="user_department" id="user_department" placeholder="Select Department ..." class="form-control" required='true'>
                                                            <?php
                                                                $staus = "1";
                                                                $sqdepts="SELECT dept_id, department_name from user_department where status=:staus";
                                                                $query_depts = $dbh -> prepare($sqdepts);
                                                                $query_depts->bindParam(':staus', $staus, PDO::PARAM_STR);
                                                                $query_depts->execute();
                                                                $result_depts=$query_depts->fetchAll(PDO::FETCH_OBJ);
                                                                $cnt=1;
                                                                if ($query_depts->rowCount() > 0) {
                                                                    foreach ($result_depts as $row_depts) {
                                                                        $dept_id = $row_depts->dept_id;
                                                                        $dept_name = $row_depts->department_name;
                                                                        if ($row->user_department == $dept_id) {
                                                                            $selected = "selected";
                                                                        }else{
                                                                            $selected = "";
                                                                        }
                                                                        ?>
                                                                            <option value="<?php  echo $dept_id;?>" <?php print $selected; ?> ><?php  echo $dept_name;?></option>
                                                                        <?php
                                                                        $cnt=$cnt+1;
                                                                    }
                                                                }
                                                            ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                                <input type="hidden" name="member_id" id="member_id" value="<?php echo $row->member_id ;?>" />
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
        function ValidatePassword() {
            var mem_no = document.getElementById("mem_no").value;
            if (mem_no=="") {
                alert("Fill in the Member Number.");
                return false;
            }
            var fname = document.getElementById("fname").value;
            if (fname=="") {
                alert("Fill in the Member First Name.");
                return false;
            }
            var lname = document.getElementById("lname").value;
            if (lname=="") {
                alert("Fill in the Member Last Name.");
                return false;
            }
            var national_id = document.getElementById("national_id").value;
            if (national_id=="") {
                alert("Fill in the Member ID / Passport No.");
                return false;
            }
            var phnumber = document.getElementById("phnumber").value;
            if (phnumber=="") {
                alert("Fill in the Member Phone No.");
                return false;
            }
            var user_department = document.getElementById("user_department").value;
            if (user_department=="") {
                alert("Select user Department.");
                return false;
            }
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("cpassword").value;
            if (password != confirmPassword || password=="" ) {
                alert("Passwords do not match.");
                return false;
            }
            var email = document.getElementById("email").value;            
            if ( (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) != true || email=="" )
            {
                alert("You have entered an invalid email address!");
                return (false);
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
</body>
</html>
<?php
}
 ?>
