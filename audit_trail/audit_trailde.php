

<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) 
{
  header('location:logout.php');
  } else{
    $logged_inuser = $_SESSION['member_id'];
    $date1 = $_REQUEST['date1'];
    $date2 = $_REQUEST['date2'];
    $user_id = $_REQUEST['user_id'];


    $search_query = " where trail_status=1 ";
    $disp_title = "";
    if ($user_id) {
      $search_query .= " AND user_id = ".$user_id." ";
      $disp_title .= "Member: ". get_membername_fromid($dbh,$user_id);
    }
    if ($date1 && $date2) {
      $date1final  = date("Y-m-d H:i:s", strtotime($date1));
      $date2final  = date("Y-m-d 23:59:59", strtotime($date2));
      $search_query .= " AND trail_date between ".$date1final." and ".$date2final."  ";
      $disp_title .= "<b>Date From :</b>" .$date1final. "<b>To:</b>". $date2final;
    }
  	?>

<!DOCTYPE HTML>
<html>
<head>
	  <title>Badili Sacco | Audit Trail </title>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <div class="row">
          <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Audit Trail</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                      
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

                              $query_select = mysqli_query($connection, "SELECT trail_id, trail_date, trail_desc, user_id, ip_addr, trail_status from audit_trail $search_query");

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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
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
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
      function poptastic(url, windowWidth, windowHeight,description) {
       // window.open(url, width, height);


        var xPos = (screen.width/2) - (windowWidth/2);
        var yPos = (screen.height/2) - (windowHeight/2);
        window.open(url,description,"width="+ windowWidth+",height="+windowHeight +",left="+xPos+",top="+yPos);
      }
      function delettion(selects)
      {
        var obj = form1.elements['selects'];
        var title = obj.options[obj.selectedIndex].text;
        var decision = confirm('Are you Sure You want To ' + title + '?');
        if (decision)
        {         
          return true;
        }
        else
        {         
            return false;
        } 

      }
      var checkflag = "false";
      function check(field)

      {

        if (checkflag == "false") 
        {
          for (i = 0; i < field.length; i++) 
          {
            field[i].checked = true;
          }
          checkflag = "true";
          <?php $checkflag  = '1' ?>
          return "Uncheck All"; 
        }
        else 
        {
          for (i = 0; i < field.length; i++) 
          {
            field[i].checked = false; 
          }
          checkflag = "false";
          <?php $checkflag  = '0' ?>
          return "Check All"; 
        }
      }
  </script>
   
  </body>
</html>
<?php }  ?>