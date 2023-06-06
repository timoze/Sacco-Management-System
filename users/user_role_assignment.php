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
    ?>
<!DOCTYPE HTML>
<html>
<head>
	  <title>Badili Sacco | Manage User Roles </title>
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
                    <h2>User Roles</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                      <a href='javascript: void(0)' onclick=javascript:poptastic('./new_role_assignement.php',750,300,'add_role') title='Click to Add New Role' style='text-decoration:none'><button class='btn btn-success'>Assign Roles</button></a>
                      <form method="post" id="form1" novalidate>
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
									<thead> 
										<tr> 
											<th>#</th> 
                                            <th>Member</th>
											<th>Roles</th>
											<th id="other">Action</th>
                                            <th class="hidden-print"><input type="checkbox" id="check-all"  onClick='this.value=check(this.form);document.form1.go.disabled=false;' ></th>
									  	</tr>
									</thead>
								<tbody>
								<?php
                                $staus = "1";
                                $sql="SELECT * from  user_role_assignment WHERE status= :staus order by id  ";
                                $query = $dbh -> prepare($sql);
                                $query->bindParam(':staus', $staus, PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $row) {
                                        $id         = $row->id ;
                                        $user_id    = $row->user_id;
                                        $uroles     = $row->roles;

                                        $user_roles_array = explode(", ",$uroles);
                                        $roles_name_array = array();
                                        for ($iij=0; $iij < count($user_roles_array); $iij++) { 
                                            $roleid = $user_roles_array[$iij];
                                            $rolename = get_role_name($dbh,$roleid);
                                            $roles_name_array[$iij] = $rolename;
                                        }
                                       // print_r($user_roles_array);
                                        $user_roles_disp = implode(", ",$roles_name_array);

                                        //$role_name_from_id = get_role_name($dbh,$id);
                                        $edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_role_assignement.php?editid='.$row->id.'","750","300","role") title="Click to Edit User Role" style="text-decoration:none">Edit</a>';
                                        $action = '<div class="input-group-btn">
                                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                                                    <li>'.$edit.'</li>
                                                                                </ul>
                                                                            </div>';
            ?>
                            <tr class="active">
                                <th><?php echo htmlentities($cnt);?></th>
                                <td width=30%><?php  echo htmlentities(get_membername_fromid($dbh,$user_id));?></td>
                                <td width=60%><?php  echo htmlentities(($user_roles_disp));?></td>
                                <td id="other"><?php echo $action;?></td>
                                <td class="hidden-print"><input type="checkbox" id="check-all" class="delete-id" name="chk_id[]" value="<?php echo $row->id;?>" onClick="document.go.disabled=false"></td>

                                <input type="hidden" id="users_all" name="usersl[]" value="<?php echo $row->user_id;?>">
                            </tr>
                            <?php $cnt=$cnt+1;
        }
        ?>
                   </tbody> 
								  <?php
    }
    ?>
									 </table> 
                   <table class="hidden-print" width="100%" border="0">
                      <tr>
                        <td width="80%">&nbsp;</td>
                        <td nowrap="nowrap" align=right>
                          <select name="selects">
                            <option value="1">Delete</option>
                          </select>
                          <input type="submit" name="go" id="go" value="Go" onClick="return delettion(selects);"/>
                        </td>
                      </tr>
                    </table>
                      </form>
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
<?php
    if ($_POST['go']) {
        // $number = $_POST['number_count'];
        // print "Hello";
        $select = $_POST['selects'];
        if (isset($_POST['chk_id'])) {
            $arr = $_POST['chk_id'];
            $uarr = $_POST['usersl'];
            if ($select == '1') {//delete role
                $status = 0;
                $ikk = 0;
                foreach ($arr as $role_id) {
                    $u_id = $uarr[$ikk];
                    $user_name_from_id = get_membername_fromid($dbh, $u_id);
                    $sql="DELETE from user_role_assignment where id=:eid";
                    $query2=$dbh->prepare($sql);
                    $query2->bindParam(':eid', $role_id, PDO::PARAM_STR);
                    $query2->execute();
                    $audit_description = "Deleted Role Assignment for User ".$user_name_from_id." - ID (" . $role_id .")";
                    audit_trail($dbh, $audit_description, $logged_inuser);
                    $ikk++;
                }
            } 
        }
        $url = "user_role_assignment.php";
        print "<script language='javascript'>window.location.href = '" . $url . "';</script>";
    }
    ?>
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
<?php
}  
?>