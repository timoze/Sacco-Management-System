<?php
ob_start();
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) 
{
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
  } else{
    $logged_inuser = $_SESSION['member_id'];
    $user_department = get_user_departmentfrom_id($dbh, $logged_inuser);
    //print $user_department;
    $department_name = get_user_department($dbh, $user_department);
    $member_roles_array = get_member_roles($logged_inuser);
  	?>
<!DOCTYPE HTML>
<html>
<head>
	  <title>Badili Sacco | Contribution List </title>
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
                    <h2>Contribution List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <?php
								if(in_array(1,$member_roles_array) )
								{ ?>
                            <a href='javascript: void(0)' onclick=javascript:poptastic('./new_contribution.php',850,750,'new_contribution') title='Click to Add New Member' style='text-decoration:none'><button class='btn btn-success'>New Contribution</button></a>
                            <?php }?>
                      <form method="post" id="form1" novalidate>
								<table id="cont_list" class="table table-striped table-bordered" style="width:100%"> 
									<thead> 
										<tr> 
											<th>#</th> 
											<th>Member Name</th>
											<th>Contribution Date</th>
											
                      <th>Txn No.</th>
											<th>Amount</th>
                     
											 
                      <th id="other">Action</th>
                      <th id="other"></th>
									  </tr>
									</thead>
								<tbody>
								<?php
								if(!in_array(4,$member_roles_array) )
								{ 
									//$client_name=$_POST['client_name']; 
									$search_query = " AND member_id=:loggeduser ";
								}
								else{
									$search_query= "";
								}
								$staus = "1";
                $cr_dr = "D";
								$sql="SELECT * from  member_contribution_main WHERE status= :staus $search_query order by contribution_date desc";
								$query = $dbh -> prepare($sql);
								$query->bindParam(':staus',$staus,PDO::PARAM_STR);
              //  $query->bindParam(':crdr',$cr_dr,PDO::PARAM_STR);
                if(!in_array(4,$member_roles_array) )
								{ 
                  $query->bindParam(':loggeduser',$logged_inuser,PDO::PARAM_STR);
                }
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								$total_amount = 0;
                if ($query->rowCount() > 0) {
                  foreach ($results as $row) {
                    $id                   =   $row->id;
                    $member_id            =   $row->member_id;
                   // $payment_type         =   $row->payment_type;
                    $contribution_date    =   $row->contribution_date;
                   // $contribution_amount  =   $row->contribution_amount;
                    $txn_id               =   $row->txn_id;
                    $date_registered      =   $row->date_created;
                    $created_by           =   $row->created_by;
                    $status               =   $row->status;
                    $contrib_amt_query    =   mysqli_fetch_assoc(mysqli_query($connection, "SELECT sum(contribution_amount) as total_contribution from member_contribution where contrib_id='$id' and status='1' "));
                    $contribution_amount  = $contrib_amt_query['total_contribution'];
                    //$client_name = get_clientname_fromid($dbh, $client_id);
                    $datereg = date("d-m-Y H:i:s",strtotime($date_registered));
                    $view = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view_contribution_details.php?contribution_id='.$row->id.'","750","800","view_invoice") title="Click to View" style="text-decoration:none">View Details</a>';
                    $edit = '';
                    $load = '';
                    if(in_array(1,$member_roles_array) )
                    { 
                        $edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_contribution_details.php?editid='.$row->id.'","850","750","edit_user_details") title="Click to Edit User Details" style="text-decoration:none">Edit</a>';
                        $load = '<input type="checkbox" id="check-all" class="delete-id" name="chk_id[]" value="<?php echo $id;?>" onClick="document.go.disabled=false">';
                    }
                    //$delete = '<a href="delete_invoice.php?invoice_id='.$row->invoice_id.'" title="Click to Delete" style="text-decoration:none">Delete</a>';
                    $delete = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./delete_invoice.php?editid='.$row->id.'","670","500","delete_invoice") title="Click to Delete " style="text-decoration:none">Delete</a>';
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
                                <td ><?php  echo htmlentities(get_membername_fromid($dbh,$member_id));?></td>
                                <td nowrap="nowrap"><?php  echo htmlentities(date("d-m-Y",strtotime($contribution_date)));?></td>
                               
                                <td nowrap="nowrap"><?php  echo htmlentities($txn_id);?></td>
                                <td nowrap="nowrap" style="text-align: right;"><?php  echo htmlentities(number_format($contribution_amount,2));?></td>
                               
                                        
                                <td id="other" style="text-align: center;"><?php echo $action;?></td>
                                <td class="hidden-print" style="text-align: center;"><?php echo $load;?></td>
                            </tr>
                            <?php 
                            $cnt=$cnt+1;
                            $total_amount = $total_amount +$contribution_amount;
                    }
                    ?>
                   </tbody> 
                        <tr class="active">
                            <th></th>
                            <th ></th>
                       
                            <th nowrap="nowrap"></th>
                            <th nowrap="nowrap">Total : </th>
                            <th nowrap="nowrap" style="text-align: right;"><?php  echo htmlentities(number_format($total_amount,2));?></th>
                                    
                            <th id="other"></th>
                            <th class="hidden-print"></th>
                        </tr>
                   <tfoot>
                   </tfoot>
								  <?php
                  } 
									?>
									 </table> 
                    <?php
                    ?>
                      <table class="hidden-print" width="100%" border="0">
                          <tr>
                            <td width="80%">&nbsp;</td>
                            <td nowrap="nowrap" align=right>
                              <select name="selects">
                                <option value="1">Cancel</option>
                                <option value="2">Delete</option>
                              </select>
                              <input type="submit" name="go" id="go" value="Go" onClick="return delettion(selects);"/>
                            </td>
                          </tr>
                        </table>
                      <?php
                      ?>
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
    if($_POST['go'])
    {
     // $number = $_POST['number_count'];
    // print "Hello";
      $select = $_POST['selects'];
      if (isset($_POST['chk_id'])) {
        $arr = $_POST['chk_id'];
          if ($select == '0') { //Activate client
              $status = 1;
              //print $status;
              foreach ($arr as $cntrb_id) {
                $sql="UPDATE member_contribution_main SET status=:status where id=:eid";
                $query1=$dbh->prepare($sql);
                $query1->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                $query1->bindParam(':status', $status, PDO::PARAM_STR);
                $query1->execute();


                $sql3="UPDATE member_contribution SET status=:status where contrib_id=:eid";
                $query11=$dbh->prepare($sql3);
                $query11->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                $query11->bindParam(':status', $status, PDO::PARAM_STR);
                $query11->execute();


                $mbr_id = get_memberid_fromcontribution_id($dbh, $cntrb_id);
                $txn_id = get_txnid_fromcontribution_id($dbh, $cntrb_id);
                $fnames = get_membername_fromid($dbh, $mbr_id);
                $audit_description = "Activated Contribution for (" . $fnames ." ) TXN ID :- ".$txn_id." ";
                audit_trail($dbh, $audit_description, $logged_inuser);
              }
          } elseif ($select == '1') {//de-Activate files
              $status = 0;
              foreach ($arr as $cntrb_id) {
                  $sql="UPDATE member_contribution_main SET status=:status where id=:eid";
                  $query2=$dbh->prepare($sql);
                  $query2->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                  $query2->bindParam(':status', $status, PDO::PARAM_STR);
                  $query2->execute();

                  $sql2="UPDATE member_contribution SET status=:status where contrib_id=:eid";
                  $query12=$dbh->prepare($sql2);
                  $query12->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                  $query12->bindParam(':status', $status, PDO::PARAM_STR);
                  $query12->execute();



                  $mbr_id = get_memberid_fromcontribution_id($dbh, $cntrb_id);
                  $txn_id = get_txnid_fromcontribution_id($dbh, $cntrb_id);
                  $fnames = get_membername_fromid($dbh, $mbr_id);
                  $audit_description = "Cancelled Contribution for (" . $fnames .") TXN ID :- ".$txn_id."";
                  audit_trail($dbh, $audit_description, $logged_inuser);
              }
          } elseif ($select == '2') { //delete clients
            $status = 9;
            foreach ($arr as $cntrb_id) {
                $sql="UPDATE member_contribution_main SET status=:status where id=:eid";
                $query2=$dbh->prepare($sql);
                $query2->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                $query2->bindParam(':status', $status, PDO::PARAM_STR);
                $query2->execute();


                $sql2="UPDATE member_contribution SET status=:status where contrib_id=:eid";
                $query22=$dbh->prepare($sql2);
                $query22->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                $query22->bindParam(':status', $status, PDO::PARAM_STR);
                $query22->execute();


                $mbr_id = get_memberid_fromcontribution_id($dbh, $cntrb_id);
                $txn_id = get_txnid_fromcontribution_id($dbh, $cntrb_id);
                $fnames = get_membername_fromid($dbh, $mbr_id);
                $audit_description = "Deleted Contribution for (" . $fnames .") TXN ID :- ".$txn_id."";
                audit_trail($dbh, $audit_description, $logged_inuser);
            }
          }
      }
      $url = "contributions_list.php";
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
      $(document).ready(function() {
          var table = $('#cont_list').DataTable( {
              responsive: false
          } );
      } );
  </script>
  </body>
</html>
<?php }  ?>