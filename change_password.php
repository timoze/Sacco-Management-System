<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('./php_functions/functions.php');
include('./session.php');
if (!CheckSession()) {
   // header('location:index.php');
   ?>
    <script>
        parent.location.reload();
    </script>
  <?php

} else{
    $op = $_REQUEST['op'];
    $logged_inuser = $_SESSION['member_id'];

    if (isset($_POST['submit'])) {
        $oldpasswd      =   md5($_POST['oldpassword']);
        $membrid        =   $_POST['membrid'];
        $newpassword    =   md5($_POST['newpassword']);
        $status         =   1;
        $sql ="SELECT email FROM users WHERE member_id=:mbr_id and password=:oldpass and status=:staus";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':mbr_id', $membrid, PDO::PARAM_STR);
        $query-> bindParam(':oldpass', $oldpasswd, PDO::PARAM_STR);
        $query-> bindParam(':staus', $status, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        if ($query -> rowCount() > 0) {
            $con="update users set password=:newpassword where member_id=:mbr_id and status=:staus";
            $chngpwd1 = $dbh->prepare($con);
            $chngpwd1-> bindParam(':mbr_id', $membrid, PDO::PARAM_STR);
            $chngpwd1-> bindParam(':staus', $status, PDO::PARAM_STR);
            $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd1->execute();
            // echo "<script>alert('Your Password succesfully changed');</script>";
            echo "<script>window.location.href ='change_password.php?op=ok'</script>";
        } else {
            // echo "<script>alert('Email id or Mobile no is invalid');</script>";
            echo "<script>window.location.href ='change_password.php?op=no'</script>";
        }
    }

    ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Badili SACCO | Forgot Password</title>

	<!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	<script type="text/javascript">
		function valid()
		{
			if (document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value) {
				alert("New Password and Confirm Password Field do not match  !!");
				document.chngpwd.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head> 
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <div class="login_wrapper">
                                        <div class="animate form login_form">
                
                                            <section class="login_content">
                                            
                                                <form id="login" method="post" name="chngpwd" onSubmit="return valid();"> 
                                                    <h2>Change Password</h2>
                                                    <?php
                                                        if ($op=="ok") {
                                                            ?>
                                                        <div class="alert alert-success" role="alert">
                                                            Your Password succesfully changed .
                                                        </div>
                                                    <?php
                                                        } elseif ($op == "no") {
                                                            ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            Password Reset Failed! Enter correct old password, try again!.
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>

                                                    <div>
                                                        <input type="password" value="" name="oldpassword" required="true"   placeholder="Old Password" />
                                                    </div>
                                                    
                                                    <div>
                                                        <input type="password" value="" name="newpassword" required="true"   placeholder="New Password" />
                                                    </div>
                                                    <div>
                                                        <input type="password" value=""  name="confirmpassword" required="true"   placeholder="Confirm Password" />
                                                    </div>
                                                    <div>
                                                        <input type="hidden" value="<?php echo $logged_inuser;?>"  name="membrid" required="true"  />
                                                    </div>
                                                    
                                                    <div>
                                                        <input type="submit" name="submit" class="btn btn-default" value="Reset" />
                                                        
                                                    </div>
                                                    
                                                    
                                                </form>
                                            </section>
                                        </div>
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
  </body>
</html>
<?php
}
 ?>