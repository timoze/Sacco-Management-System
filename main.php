<?php
ob_start();
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('./php_functions/functions.php');
include('./session.php');
//print $_SESSION['member_id'];
if (!CheckSession()) 
{
  header('location:logout.php');
  } else{
      //if(isset($_POST['submit']))
      if (isset($_GET['menucat_id']) && isset($_GET['id'])) {
          $menu_ids = $_GET['menucat_id'];
          $sub_ids = $_GET['id'];
      } else {
          $menu_ids = 4;
          //$menu_ids = '42';
      }
      if ($menu_ids==4) {
          $hrefs = "dashboard.php";
          $menu_descs	= "Dashboard";
      }elseif ($menu_ids==99) {
          $hrefs = "audit_trail/audit_trail.php";
          $menu_descs	= "Audit Trail";
      }
      elseif ($menu_ids==98) {
        $hrefs = "change_password.php";
        $menu_descs	= "Change Password";
    }  
      else {
          $stat ='1';
          $sqlmenu_subs="SELECT * from  menu_sub where status=:aid and menu_id=:menuid and sub_id=:subs";
          $query_menu_subs = $dbh -> prepare($sqlmenu_subs);
          $query_menu_subs->bindParam(':subs', $sub_ids, PDO::PARAM_STR);
          $query_menu_subs->bindParam(':aid', $stat, PDO::PARAM_STR);
          $query_menu_subs->bindParam(':menuid', $menu_ids, PDO::PARAM_STR);
          $query_menu_subs->execute();
          $result_menu_subs=$query_menu_subs->fetchAll(PDO::FETCH_OBJ);
          if ($query_menu_subs->rowCount() > 0) {
              foreach ($result_menu_subs as $row_menu_subs) {
                  //$sub_id 	= $row_menu_subs->sub_id;
                  $sub_descs	= $row_menu_subs->description;
                  $hrefs		= $row_menu_subs->href;
              }
          }
      }
      $status ='1';
      $sqlmenu_query="SELECT description from menu where status=:aid and menu_id=:menuid ";
      $query_menus = $dbh -> prepare($sqlmenu_query);
      $query_menus->bindParam(':aid', $status, PDO::PARAM_STR);
      $query_menus->bindParam(':menuid', $menu_ids, PDO::PARAM_STR);
      $query_menus->execute();
      $result_menus=$query_menus->fetchAll(PDO::FETCH_OBJ);
      foreach ($result_menus as $row_menus) {
          $menu_descs	= $row_menus->description;
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
    <title>Badili SACCO | <?php echo $menu_descs;?> </title>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <style>
      .badge {
        position: relative;
        top: -20px;
        left: -25px;
        border: 1px solid black;
        border-radius: 50%;
       }
    button {
        margin:5px;
       }
       .round_span {
          position: relative;
          height: 18px;
          width: 18px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
        }
    </style>
  </head>
  <script type="text/javascript">
        //function resizeIframe(obj) {
        //  obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        //}
function resizeIFrameToFitContent(iFrame) {
    iFrame.style.height = iFrame.contentWindow.document.body.scrollHeight + 'px';
   // iFrame.style.height = parent.getDocumentHeight();
}
window.addEventListener('DOMContentLoaded', function(e) {
    var iFrame = document.getElementById( 'iframeID' );
    resizeIFrameToFitContent( iFrame );
} );
  </script>
    <?php
      $aid=$_SESSION['member_id'];
      $user_department = get_user_departmentfrom_id($dbh, $aid);
      //print $user_department;
      $department_name = get_user_department($dbh, $department_id);

      $notifications_count = 0;
      // Loans pending approval
      $loan_pproval_count = 0;
      if ($user_department == 5) {
        $query_loan_approval_count = mysqli_query($connection, "SELECT appl_id from loan_application where status='0' ");
        while ($row = mysqli_fetch_assoc($query_loan_approval_count)) {
          $appl_id = $row['appl_id'];
          //if guranteed check if al approved
          $g_array = check_loan_status($dbh, $appl_id);
          if ($g_array == '0') {
            $loan_pproval_count++;
          }
        }
      }
    //loan guarantee requests
      $loan_guarantee_approval_count = 0;
      $loansguaranteed = mysqli_query($connection, "SELECT id FROM loan_guarantors WHERE status = '0' and guarantor='$aid' order by id DESC ");
      while ($row = mysqli_fetch_assoc($loansguaranteed)) {
        $gid = $row['id'];
        $loan_guarantee_approval_count++;
      }
      //$loan_guarantee_approval_count = get_member_guaranteed_amount($aid);

      $notifications_count = $loan_pproval_count + $loan_guarantee_approval_count;
    ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;" >
              <a href="index.php" class="site_title" ><img src="<?php echo LOGO;?>" width="230" height="100%" alt="<?php echo $company_name;?>"> </a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo get_memberprofile_fromid($dbh, $aid);
                ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo get_memberfirstname_fromid($dbh, $aid);?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
            <?php
                //$aid=$_SESSION['clientmsaid'];
                $status='1';
                $sqlmenu="SELECT * from  menu where status=:aid order by ordering ASC";
                $query_menu = $dbh -> prepare($sqlmenu);
                $query_menu->bindParam(':aid',$status,PDO::PARAM_STR);
                $query_menu->execute();
                $result_menu=$query_menu->fetchAll(PDO::FETCH_OBJ);
                if ($query_menu->rowCount() > 0) {
                    foreach ($result_menu as $row_menu) {
                        $menu_id	= $row_menu->menu_id;
                        $main_desc	= $row_menu->description;
                        $href1		= $row_menu->href1;
                        $faicons	= $row_menu->faicons;
                        if ($menu_id==$menu_ids) {
                            $class_active = ' class="active " ';
                        } else {
                            $class_active = "";
                        }
                        if ($menu_id==4) {
                            ?>
                          <li <?php echo $class_active; ?>><a href="main.php?menucat_id=<?php echo $menu_id; ?>" ><i class="<?php echo $faicons; ?> "></i> <?php echo $main_desc; ?> <span class="fa fa-chevron-down"></span></a>
                          <?php
                        } else {
                            ?>
                          <li <?php echo $class_active; ?>><a ><i class="<?php echo $faicons; ?> "></i> <?php echo $main_desc; ?> <span class="fa fa-chevron-down"></span></a>
                        <?php
                        } ?>
                            <ul class="nav child_menu ">
                            <?php
                              $sqlmenu_sub="SELECT * from  menu_sub where status=:aid and menu_id=:menuid ";
                              $query_menu_sub = $dbh -> prepare($sqlmenu_sub);
                              $query_menu_sub->bindParam(':aid', $status, PDO::PARAM_STR);
                              $query_menu_sub->bindParam(':menuid', $menu_id, PDO::PARAM_STR);
                              $query_menu_sub->execute();
                              $result_menu_sub=$query_menu_sub->fetchAll(PDO::FETCH_OBJ);
                              if ($query_menu_sub->rowCount() > 0) {
                                  foreach ($result_menu_sub as $row_menu_sub) {
                                      $sub_id 	= $row_menu_sub->sub_id;
                                      $sub_desc	= $row_menu_sub->description;
                                      $href		= $row_menu_sub->href;
                                      if ($sub_id == $sub_ids) {
                                          $clas_active = ' class="active" ';
                                      } else {
                                          $clas_active = "";
                                      } 
                                      //print $clas_active;
                                      ?>
                                        <li ><a href="main.php?menucat_id=<?php echo $menu_id; ?>&id=<?php echo $sub_id; ?>"> <?php echo $sub_desc; ?></a></li>
                                              <?php
                                  }
                              } ?>
                            </ul>
                          </li>
                    <?php
                    }
                } 
                ?>
                </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" style="text-align: top;" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo get_memberprofile_fromid($dbh, $aid);?>" width="50" height="50" alt=""><?php print get_memberfirstname_fromid($dbh, $aid);?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href='javascript: void(0)' onclick=javascript:poptastic('./users/view_user.php?member_id=<?php echo $aid;?>',750,800,'user_profile') title='Click to View Your Profile'> Profile</a>
                    <a class="dropdown-item" id="change_password"  href='javascript: void(0)' title='Click to Change your Password'> Change Password</a>
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>



                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="dropdown-toggle" style="text-align: top;" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <span id="group">
                      <button type="button" class="btn btn-info">
                        <i class="fa fa-bell"></i>
                      </button>
                      <span class="badge badge-light"><font color='red'><b><?php echo $notifications_count;?></b></font></span>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <?php 
                    if ($loan_pproval_count>0) {
                      ?>
                        <a class="dropdown-item"  href='javascript: void(0)' onclick=javascript:poptastic('./loans/process_loan_applications.php',1200,800,'loan_approval') title='Click to Approve Loan'>Loan Awaiting your Approval <span class="pull-right" ><font color=red><?php echo $notifications_count;?></font></span></a>
                      <?php
                    }
                    if ($loan_guarantee_approval_count>0) {
                      ?>
                        <a class="dropdown-item"  href='javascript: void(0)' onclick=javascript:poptastic('./loans/process_loan_applications_guarantor.php',1200,800,'loan_approval') title='Click to Approve Loan'>Loan Guarantee Request <span class="pull-right" ><font color=red><?php echo $loan_guarantee_approval_count;?></font></span></a>
                      <?php
                    }
                    ?>
                    
                    
                  </div>
                </li>



                <li class="nav-item" style="padding-left: 30px;">
                  <a class="dropdown-item" id="audit_trail" title="Click for Audit Trail" class="user-profile"  aria-expanded="false">
                    Audit Trail
                  </a>
                </li>             
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 ">
            <iframe width="100%" height="100%" name="iframeID" seamless="seamless"  src="<?php print $hrefs; ?>" id = "iframeID"  frameborder="0" scrolling="yes" onload="resizeIFrameToFitContent(this)"></iframe>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; <?php echo $company_name; ?> <?php echo date("Y");?>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script>
      function poptastic(url, windowWidth, windowHeight,description) {
       // window.open(url, width, height);
        var xPos = (screen.width/2) - (windowWidth/2);
        var yPos = (screen.height/2) - (windowHeight/2);
        window.open(url,description,"width="+ windowWidth+",height="+windowHeight +",left="+xPos+",top="+yPos);
      }
      </script>
      <script type="text/javascript">
        $("#audit_trail").click(function(){
          document.location.href = "main.php?menucat_id=99&id=999";
        });
        $("#change_password").click(function(){
          document.location.href = "main.php?menucat_id=98&id=998";
        });
    </script>
  </body>
</html>
<?php
}
?>