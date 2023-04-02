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
    $logged_user_department = get_user_departmentfrom_id($dbh, $logged_inuser);
    $deptsarray = array('2','3');
    ?>
<!DOCTYPE HTML>
<html>
<head>
	  <title>Badili Sacco | Member List </title>
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
                    <h2>Member List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">

                            <?php
                            $query_users = " AND member_id=:loggeduser ";
                              if(in_array($logged_user_department,$deptsarray) )
                              { 
                                $query_users = "";
                                ?>
                                  <a href='javascript: void(0)' onclick=javascript:poptastic('./new_member.php',750,800,'new_member') title='Click to Add New Member' style='text-decoration:none'><button class='btn btn-success'>New Member</button></a>
                              <?php 
                              }
                            ?>
                     
                      <form method="post" id="form1" novalidate>
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
									<thead> 
										<tr> 
											<th>#</th> 
											<th>Mem No.</th>
											<th>Name</th>
											<th>ID No.</th>
											<th>Phone No.</th>
											<th>Email</th> 
											<th>Department</th>
											<th>Date Registered</th> 
											<th id="other">Action</th>
                      <th class="hidden-print"><input type="checkbox" id="check-all"  onClick='this.value=check(this.form);document.form1.go.disabled=false;' ></th>
									  	</tr>
									</thead>
								<tbody>
								<?php
              //  print $query_users;
               
                               
                $staus = "1";
    $sql="SELECT * from  users WHERE status= :staus $query_users order by member_id ";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':staus', $staus, PDO::PARAM_STR);
    if(!in_array($logged_user_department,$deptsarray) )
    { 
      $query->bindParam(':loggeduser',$logged_inuser,PDO::PARAM_STR);
    }
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if ($query->rowCount() > 0) {
        foreach ($results as $row) {
            $member_id = $row->member_id;
            $member_no = $row->member_no;
            $first_name = $row->first_name;
            $last_name = $row->last_name;
            $user_names = $first_name." ".$last_name;
            $id_no = $row->id_no;
            $physycal_address = $row->physycal_address;
            $email = $row->email;
            $phone_no = $row->phone_no;
            $user_department = $row->user_department;
            $password = $row->password;
            $password_expiry = $row->password_expiry;
            $date_registered = $row->date_registered;
            $status = $row->status;
            $datereg = date("d-m-Y H:i:s", strtotime($date_registered));
            $view = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view_user.php?member_id='.$row->member_id.'","750","800","view_invoice") title="Click to View" style="text-decoration:none">View Details</a>';

            $edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_user_details.php?editid='.$row->member_id.'","750","800","edit_user_details") title="Click to Edit User Details" style="text-decoration:none">Edit</a>';
            $load = '<input type="checkbox" id="check-all" class="delete-id" name="chk_id[]" value="<?php echo $row->member_id;?>" onClick="document.go.disabled=false">';
            if(!in_array($logged_user_department,$deptsarray) ){
              $edit = "";
              $load = "";
            }
            
            //$delete = '<a href="delete_invoice.php?invoice_id='.$row->invoice_id.'" title="Click to Delete" style="text-decoration:none">Delete</a>';
            $delete = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./delete_invoice.php?invoice_id='.$row->member_id.'","670","500","delete_invoice") title="Click to Delete " style="text-decoration:none">Delete</a>';
            $action = '<div class="input-group-btn">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
                                        </button>
                                          <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <li>'.$edit.'</li>
                                                        <li>'.$view.'</li>
                                                    </ul>
                                                </div>';
            ?>
                            <tr class="active">
                                <th><?php echo htmlentities($cnt);?></th>
                                <td><?php  echo htmlentities($member_no);?></td>
                                <td style="width: 40%"><?php  echo htmlentities($user_names);?></td>
                                <td nowrap="nowrap"><?php  echo htmlentities($id_no);?></td>
                                <td nowrap="nowrap"><?php  echo htmlentities($phone_no);?></td>
                                <td nowrap="nowrap"><?php  echo htmlentities($email);?></td>
                                <td nowrap="nowrap"><?php  echo htmlentities(get_user_department($dbh, $user_department));?></td> 
                                <td nowrap="nowrap"><?php  echo htmlentities($datereg);?></td>           
                                <td id="other" style="text-align: center;"><?php echo $action;?></td>
                                <td class="hidden-print" style="text-align: center;"><?php echo $load;?></td>
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
                            <option value="0">Activate User(s)</option>
                            <option value="1">Deactivate User(s)</option>
                            <option value="2">Delete User(s)</option>
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
            if ($select == '0') { //Activate client
                $status = 1;
                //print $status;
                foreach ($arr as $client_id) {
                    $sql="UPDATE users SET status=:status where member_id=:eid";
                    $query1=$dbh->prepare($sql);
                    $query1->bindParam(':eid', $client_id, PDO::PARAM_STR);
                    $query1->bindParam(':status', $status, PDO::PARAM_STR);
                    $query1->execute();
                    $fnames = get_membername_fromid($dbh, $client_id);
                    $audit_description = "Activated Member details for (" . $fnames ." )";
                    audit_trail($dbh, $audit_description, $logged_inuser);
                }
            } elseif ($select == '1') {//de-Activate files
                $status = 0;
                foreach ($arr as $client_id) {
                    $sql="UPDATE users SET status=:status where member_id=:eid";
                    $query2=$dbh->prepare($sql);
                    $query2->bindParam(':eid', $client_id, PDO::PARAM_STR);
                    $query2->bindParam(':status', $status, PDO::PARAM_STR);
                    $query2->execute();
                    $fnames = get_membername_fromid($dbh, $client_id);
                    $audit_description = "Deactivated Member details for (" . $fnames .")";
                    audit_trail($dbh, $audit_description, $logged_inuser);
                }
            } elseif ($select == '2') { //delete clients
                foreach ($arr as $client_id) {
                    $sql="DELETE from users where member_id=:eid";
                    $query3=$dbh->prepare($sql);
                    $query3->bindParam(':eid', $client_id, PDO::PARAM_STR);
                    $query3->execute();
                    $fnames = get_membername_fromid($dbh, $client_id);
                    $audit_description = "Deleted Member details for (" . $fnames ." )";
                    audit_trail($dbh, $audit_description, $logged_inuser);
                }
            }
        }
        $url = "users_list.php";
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