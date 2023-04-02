<?php
session_start();
ob_start();
//error_reporting(0);
include('includes/dbconnection.php');
include('./php_functions/functions.php');
include('./session.php');


$redirect = "";
$rediret = "";
if($_REQUEST['location'] != '') {
  $redirect = htmlspecialchars($_REQUEST['location']);
  $rediret = $_REQUEST['location'];
}

if (isset($_SESSION['member_id'])) 
{
  header("Location:main.php". $redirect);
  exit();
}
//function main_page($company_name, $redirect, $dbh){

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
            //print $_SESSION['username'];

            $audit_description = "Successfull User Login";
            audit_trail($dbh, $audit_description, $result->member_id);
            if($redirect) {
              header("Location:". $redirect);
             // $url = "contributions_list.php";
             // print "<script language='javascript'>window.location.href = '" . $redirect . "';</script>";
          } else {
            header("Location:main.php".$redirect);

            //$url = "main.php".$redirect;
            //print "<script language='javascript'>window.location.href='".$url."';</script>";
           
            
          }
           // echo "<script type='text/javascript'> document.location ='main.php'; </script>";
        }
    } else {
      header("Location:index.php?op=no&location=" .$redirect);
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
    <link rel="apple-touch-icon" sizes="57x57" href="./images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="./images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
    <link rel="manifest" href="./images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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
              <h1><?php print $company_name ?></h1>
              <h2>Login</h2>
              <?php
              $op = $_REQUEST['op'];
              if ($op == "no") {
                ?>
                <div class="alert alert-danger" role="alert">
                  Login Failed! Incorrect username or password.
                </div>
              <?php
              }
            ?>
              <div>
                <input type="email" class="form-control text"  name="username" required="true"  placeholder="Username" />
              </div>
              <div>
                <input type="password" class="form-control" value=""  name="password" required="true"   placeholder="Password" />
              </div>
              <div>
                <input type="submit" name="login" class="btn btn-success" value="Log in" />
                <a class="reset_pass" href="./forgot-password.php">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1><img src="<?php echo LOGO;?>" width="230" height="100%" alt="<?php echo $company_name;?>"></h1>
                  <p>&copy; <?php print $company_name; ?> <?php echo date("Y"); ?></p>
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
                  <h1><i class="fa fa-paw"></i><?php echo $company_name; ?></h1>
                  <p>&copy; <?php print $company_name ?> <?php echo date("Y"); ?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
<?php

/*
if(CheckSession())
{
	
  //print '<script language="javascript">window.top.location.href="./main.php?menucat_id='.$default_menu.'";</script>';
  header("Location:main.php". $redirect);
}
else
{
	main_page($company_name, $redirect,$dbh);
}  
*/