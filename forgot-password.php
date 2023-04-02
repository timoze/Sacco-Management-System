<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
include('./php_functions/functions.php');
$op = $_REQUEST['op'];
if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $newpassword=md5($_POST['newpassword']);
	$status = 1;
    $sql ="SELECT email FROM users WHERE email=:email and phone_no=:mobile and status=:staus";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query-> bindParam(':staus', $status, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if ($query -> rowCount() > 0) {
        $con="update users set password=:newpassword where email=:email and phone_no=:mobile";
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
        $chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
        $chngpwd1->execute();
       // echo "<script>alert('Your Password succesfully changed');</script>";
		echo "<script>window.location.href ='forgot-password.php?op=ok'</script>";
    } else {
       // echo "<script>alert('Email id or Mobile no is invalid');</script>";
		echo "<script>window.location.href ='forgot-password.php?op=no'</script>";
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
<body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
			<form id="login" method="post" name="chngpwd" onSubmit="return valid();"> 
				<h1><?php print $company_name;?></h1>
					<h2>Reset Password</h2>
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
								Password Reset Failed! Please provide correct Email and Mobile Number, try again!.
							</div>
						<?php
						}
					?>
				<div>
					<input type="text" class="form-control text" name="email" required="true"  placeholder="Email" />
				</div>
				<div>
					<input type="number" class="form-control text"  name="mobile" required="true" maxlength="10" pattern="[0-9]+"  placeholder="Mobile Number" />
				</div>
				<div>
					&nbsp;
				</div>
				<div>
					<input type="password" class="form-control" value="" name="newpassword" required="true"   placeholder="New Password" />
				</div>
				<div>
					<input type="password" class="form-control" value=""  name="confirmpassword" required="true"   placeholder="Confirm Password" />
				</div>
				<div>
                	<input type="submit" name="submit" class="btn btn-success" value="Reset" />
                	<a href="index.php">Return to Login</a>
              	</div>
				<div class="clearfix"></div>
            	<div class="separator">
				<div>
                  <h1><img src="<?php echo LOGO;?>" width="230" height="100%" alt="<?php echo $company_name;?>"></h1>
                  <p>&copy; <?php echo $company_name;?> <?php echo date("Y");?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>