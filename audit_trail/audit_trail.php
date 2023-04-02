<?php
//error_reporting(0);
ob_start();
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
//session_start();
if (!CheckSession()) {
  header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
  //exit();
} else{
    $logged_inuser = $_SESSION['member_id'];
    $user_id = $_REQUEST['user_id'];
    if (isset($_REQUEST['date_from'])) {
      $date1 = $_REQUEST['date_from'];
    }else {
      $date1 = date('d-m-Y');
    }
    if (isset($_REQUEST['date_to'])) {
      $date2 = $_REQUEST['date_to'];
    }else {
      $date2 = date('d-m-Y');
    }
    $search_query = " where trail_status=1 ";
    $disp_title = "";
    if ($user_id) {
      $search_query .= " AND user_id = ".$user_id." ";
      $disp_title .= "<b> Member : </b>". get_membername_fromid($dbh,$user_id) ."<br>";
    }
    if ($date1 && $date2) {
      $date1final  = date("Y-m-d H:i:s", strtotime($date1));
      $date2final  = date("Y-m-d 23:59:59", strtotime($date2));
      $search_query .= " AND trail_date between '".$date1final."' and '".$date2final."'  ";
      $disp_title .= "<b>Date From :</b>" .$date1. "<b>   To : </b>". $date2;
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
    <title>Badili Sacco | Audit Trail</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
                                    <form method="post" novalidate>
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>
                                            <div class="col-md-3 col-sm-3">
                                              From: <input class="form-control datepick" name="date_from" value="<?php echo date('d-m-Y');?>" required="required" />
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                              To: <input class="form-control datepick2" name="date_to" value="<?php echo date('d-m-Y');?>" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Member / User</label>
                                          <div class="col-md-3 col-sm-3">
                                            <select name="user_id" id="user_id" placeholder="Select User ..." class="form-control" required='true'>
                                            <option value=""></option>
                                              <?php
                                                $staus = "1";
                                                $sqdepts="SELECT member_id from users where status=:staus";
                                                $query_depts = $dbh -> prepare($sqdepts);
                                                $query_depts->bindParam(':staus',$staus,PDO::PARAM_STR);
                                                $query_depts->execute();
                                                $result_depts=$query_depts->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($query_depts->rowCount() > 0)
                                                {
                                                  foreach($result_depts as $row_depts)
                                                  {  
                                                    $mbr_id = $row_depts->member_id;
                                                    $mbr_name = get_membername_fromid($dbh,$mbr_id);
                                                    ?>
                                                        <option value="<?php  echo $mbr_id;?>"><?php  echo $mbr_name;?></option>
                                                    <?php 
                                                    $cnt=$cnt+1;
                                                  }
                                                } 
                                              ?>
                                            </select> 
                                          </div>
                                          <div class="col-md-3 col-sm-3"> 
                                              <button type='submit' name="submit" class="btn btn-primary">Search</button>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                          <div class="col-sm-12">
                          <div class="x_panel">
                            <div class="x_content">
                            <div class="card-box table-responsive">
                            <caption style="caption-side: top-right">AUDIT TRAIL <BR> <?php echo $disp_title; ?></caption>
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
                              <thead> 
                                <tr> 
                                  <th>*</th>
                                  <th>Date / Time</th>
                                  <th>Description</th>
                                  <th>User</th>
                                  <th>IP Address</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $staus = "1";
                              /*$sql="SELECT * from  audit_trail ";
                              $query = $dbh -> prepare($sql);
                              $query->bindParam(':staus',$staus,PDO::PARAM_STR);
                              $query->execute();
                              $results=$query->fetchAll(PDO::FETCH_OBJ);
                              */
                              $query_select = mysqli_query($connection, "SELECT trail_id, trail_date, trail_desc, user_id, ip_addr, trail_status from audit_trail $search_query order by trail_date desc");
                              $cnt=1;
                              if (mysqli_num_rows($query_select) > 0) {
                                  while ($row = mysqli_fetch_assoc($query_select)) {
                                      $trail_id       =   $row['trail_id'];
                                      $trail_date     =   $row['trail_date'];
                                      $trail_desc     =   $row['trail_desc'];
                                      $user_id        =   $row['user_id'];
                                      $ip_addr        =   $row['ip_addr'];
                                      $trail_status   =   $row['trail_status'];
                                      $traildate = date("d-m-Y H:i:s", strtotime($trail_date));
                                      ?>
                                          <tr class="active">
                                              <th><?php echo ($cnt);?></th>
                                              <td><?php  echo ($traildate);?></td>
                                              <td style="width: 40%"><?php  echo ($trail_desc);?></td>
                                              <td ><?php  echo (get_membername_fromid($dbh,$user_id));?></td>
                                              <td nowrap="nowrap"><?php  echo ($ip_addr);?></td>
                                          </tr>
                                    <?php
                                    $cnt++;
                                  }
                                ?>
                              </tbody> 
                              <?php
                            }
                            ?>
                            </table> 
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery-3.5.0.min.js"></script>

    <link href='../vendor/jquery_date_picker/css/jquery-ui.css' rel='stylesheet' type='text/css'>
    <script src="../vendor/jquery_date_picker/js/jquery-ui.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script  type="text/javascript">
        $( function() {
            $(".datepick" ).datepicker({ dateFormat: 'dd-mm-yy'
            });
            $(".datepick2" ).datepicker({ dateFormat: 'dd-mm-yy'
            });
          });
	</script>

    <script src="../vendor/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="../vendor/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="../vendor/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
    <script>
           $("#user_id").chosen();
        
    </script>
</body>
</html>
<?php
  }
 ?>
