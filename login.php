<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
include('./php_functions/functions.php');
include('./session.php');

if (isset($_POST['login'])) {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $status = 1;
    $sql ="SELECT member_id FROM users WHERE email=:username and password=:password and status=:staus";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> bindParam(':staus', $status, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            CreateSession($result->member_id, $password);
            print $_SESSION['username'];

            $audit_description = "Successfull User Login";
            audit_trail($dbh, $audit_description, $result->member_id);
            echo "<script type='text/javascript'> document.location ='main.php'; </script>";
        }
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
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

    <title>Badili SACCO | Login</title>

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
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          
            <form id="login" method="post" name="login"> 
              <h1><?php print $company_name?></h1>
              <h2>Login</h2>
              <div>
                <input type="email" class="form-control text"  name="username" required="true"  placeholder="Username" />
              </div>
              <div>
                <input type="password" value=""  name="password" required="true"   placeholder="Password" />
              </div>
              <div>
                <input type="submit" name="login" class="btn btn-default" value="Log in" />
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1><?php echo $company_name;?></h1>
                  <p>&copy; Timoze <?php echo date("Y");?></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i><?php echo $company_name;?></h1>
                  <p>&copy; Timoze <?php echo date("Y");?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
