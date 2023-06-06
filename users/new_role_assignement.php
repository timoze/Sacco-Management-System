<?php
ob_start();
session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) {
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
} else{
    $logged_inuser = $_SESSION['member_id'];
    $op = $_REQUEST['op'];
if (isset($_POST['submit'])) {
    //$clientmsaid=$_SESSION['clientmsaid'];
    $role       =   $_POST['roles'];
    $membr_id   =   $_POST['member_id'];
    
    //explode roles
    $roles = implode(', ', $role);


    $sql="INSERT into user_role_assignment(user_id, roles )values(:u_id,:uroles)";
    $query=$dbh->prepare($sql);
    $query->bindParam(':u_id', $membr_id, PDO::PARAM_STR);
    $query->bindParam(':uroles', $roles, PDO::PARAM_STR);
    $query->execute();
    $LastInsertId=$dbh->lastInsertId();
    if ($LastInsertId>0) {
        // echo '<script>alert("Client has been added.")</script>';
        $audit_description = "Added new Role Assignment for (" . get_membername_fromid($dbh, $membr_id) .")";
        audit_trail($dbh, $audit_description, $logged_inuser);
        $new_mem_no = $mem_no + 1;
        echo "<script>window.location.href ='new_role_assignement.php?op=ok'</script>";
    } else {
        echo "<script>window.location.href ='new_role_assignement.php?op=no'</script>";
    }
    // }
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
    <title>Badili Sacco | New Member Roles</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <link rel="stylesheet" href="../vendor/chosen/docsupport/style.css">
    <link rel="stylesheet" href="../vendor/chosen/docsupport/prism.css">
    <link rel="stylesheet" href="../vendor/chosen/chosen.css">

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
                                    <form method="post" novalidate onsubmit="return ValidateForm()" enctype="multipart/form-data">
                                        <span class="section">Assign User Role</span>
                                        <?php 
                                        if ($op=="ok") {
                                            ?>
                                            <div class="alert alert-success" role="alert">
                                                Roles Assigned Successfully.
                                            </div>
                                        <?php
                                        }elseif ($op == "no") {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Failed try again!.
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Member<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-9">
                                                <select name="member_id" id="member_id" placeholder="Select Client ..." class="form-control " required='true'>
                                                    <option value=""></option>
                                                    <?php
                                                        $staus = "1";
                                                        $sqclients="SELECT member_id from users where status=:staus";
                                                        $query_clients = $dbh -> prepare($sqclients);
                                                        $query_clients->bindParam(':staus',$staus,PDO::PARAM_STR);
                                                        $query_clients->execute();
                                                        $result_clients=$query_clients->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt=1;
                                                        if($query_clients->rowCount() > 0)
                                                        {
                                                            foreach($result_clients as $row_member)
                                                            {  
                                                                $mbrid = $row_member->member_id;
                                                                //member not in assigned roles
                                                                $all_assigned_members = mysqli_fetch_assoc(mysqli_query($connection,"SELECT count(*) as all_assignedusers from user_role_assignment where user_id='$mbrid' "));
                                                                $all_usersassigned= $all_assigned_members['all_assignedusers'];
                                                                if ($all_usersassigned==0) {
                                                                    ?>
                                                                        <option value="<?php  echo $row_member->member_id;?>"><?php  echo get_membername_fromid($dbh, $mbrid);?></option>
                                                                    <?php 
                                                                }
                                                                $cnt=$cnt+1;
                                                            }
                                                        } 
                                                    ?>
                                                    </select>  
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Roles<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                            <select name="roles[]" id="roles" placeholder="Select Roles ..." class="form-control " required='true' multiple>
                                                    <option value=""></option>
                                                    <?php
                                                        $staus = "1";
                                                        $sqlroles="SELECT role_id, `role` from user_roles where status=:staus";
                                                        $query_roles = $dbh -> prepare($sqlroles);
                                                        $query_roles->bindParam(':staus',$staus,PDO::PARAM_STR);
                                                        $query_roles->execute();
                                                        $result_clients=$query_roles->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt=1;
                                                        if($query_roles->rowCount() > 0)
                                                        {
                                                            foreach($result_clients as $row_roles)
                                                            {  
                                                                $mbrid = $row_roles->role_id;
                                                               
                                                                {
                                                                    ?>
                                                                        <option value="<?php  echo $row_roles->role_id;?>"><?php  echo $row_roles->role;?></option>
                                                                    <?php 
                                                                }
                                                                $cnt=$cnt+1;
                                                            }
                                                        } 
                                                    ?>
                                                    </select>  
                                            </div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary" onclick="refreshmain_window()">Submit</button>
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
            var role = document.getElementById("role").value;
            if (role=="") {
                alert("Fill in the Role");
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
    <script src="../vendor/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../vendor/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="../vendor/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="../vendor/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
    <script>
           $("#member_id").chosen();
           $("#roles").chosen();
           
    </script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>
</html>
<?php
  }
 ?>
