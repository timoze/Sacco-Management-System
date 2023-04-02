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
    $department_name = get_user_department($dbh, $department_id);
  	?>
<!DOCTYPE HTML>
<html>
<head>
	  <title>Badili Sacco | Expenses </title>
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
                    <h2>Expenses</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                      <a href='javascript: void(0)' onclick=javascript:poptastic('./new_expense.php',650,600,'new_contribution') title='Click to Add New Expense' style='text-decoration:none'><button class='btn btn-success'>New Expense</button></a>
                      <form method="post" id="form1" novalidate>
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
									<thead> 
										<tr> 
											<th>#</th> 
										
											<th>Expense Date</th>
                      <th>Txn No.</th>
											<th>Description</th>
                      
											<th>Amount</th>
                      <th>Status</th>
                      <th id="other">Action</th>
                      <th id="other"></th>
									  </tr>
									</thead>
								<tbody>
								<?php
                $staus = 9;
								
								$sql="SELECT * from  expenses where status!=:staus order by expense_date desc";
								$query = $dbh -> prepare($sql);
								$query->bindParam(':staus',$staus,PDO::PARAM_STR);
               
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								$total_amount = 0;
                if ($query->rowCount() > 0) {
                  foreach ($results as $row) {
                    $id                   =   $row->expense_id;
                    
                    $expense_date         =   $row->expense_date;
                    $txn_id               =   $row->txn_id;
                    $expense_amount       =   $row->amount;                   
                    $brief_description    =   $row->brief_description;
                    $date_registered      =   $row->date_created;
                    $created_by           =   $row->created_by;
                    $status               =   $row->status;
                    
                    if ($status=="0") {
                      //$status_desc = "PENDING";
                      $status_desc = '<font color=orange><b>PENDING</b></font>';
                      $load = '<input type="checkbox" id="check-all" class="delete-id" name="chk_id[]" value="'.$id.'" onClick="document.go.disabled=false">';
                      $edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_expense_details.php?editid='.$row->expense_id.'","650","600","edit_user_details") title="Click to Edit User Details" style="text-decoration:none">Edit</a>';
                    }elseif($status=="1"){
                      //$status_desc = "APPROVED";
                      $status_desc = '<font color=green><b>APPROVED</b></font>';
                      $load = "";
                      $edit = "";
                    }elseif($status=="3"){
                      //$status_desc = "APPROVED";
                      $status_desc = '<font color=red><b>CANCELLED</b></font>';
                      $load = "";
                      $edit = "";
                    }
                    
                    //$client_name = get_clientname_fromid($dbh, $client_id);
                    $datereg = date("d-m-Y H:i:s",strtotime($date_registered));
                    $view = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view_expense_details.php?editid='.$row->expense_id.'","750","800","view_invoice") title="Click to View" style="text-decoration:none">View Details</a>';
                    
                    //$delete = '<a href="delete_invoice.php?invoice_id='.$row->invoice_id.'" title="Click to Delete" style="text-decoration:none">Delete</a>';
                   
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
  
                                <td nowrap="nowrap"><?php  echo htmlentities(date("d-m-Y",strtotime($expense_date)));?></td>
                                <td nowrap="nowrap"><?php  echo htmlentities($txn_id);?></td>
                                <td width=40%><?php  echo htmlentities($brief_description);?></td>
                                <td nowrap="nowrap" style="text-align: right;"><?php  echo htmlentities(number_format($expense_amount,2));?></td>
                                <td nowrap="nowrap" style="text-align: center;"><?php  echo $status_desc;?></td>     
                                <td id="other" style="text-align: center;"><?php echo $action;?></td>
                                <td class="hidden-print" style="text-align: center;"><?php echo $load;?></td>
                            </tr>
                            <?php 
                            $cnt=$cnt+1;
                            $total_amount = $total_amount +$expense_amount;
                    }
                    ?>
                   </tbody> 
                        <tr class="active">
                            <th></th>
                            <th ></th>
                            <th ></th>
                          
                            <th nowrap="nowrap">Total : </th>
                            <th nowrap="nowrap" style="text-align: right;"><?php  echo htmlentities(number_format($total_amount,2));?></th>
                            <th></th>   
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
                                <option value="1">Approve</option>
                                <option value="2">Cancel</option>
                                <option value="3">Delete</option>
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
          if ($select == '1') { //Approve
              $status = 1;
              //print $status;
              foreach ($arr as $expses_id) {
                $sql="UPDATE expenses SET status=:status where expense_id=:eid";
                $query1=$dbh->prepare($sql);
                $query1->bindParam(':eid', $expses_id, PDO::PARAM_STR);
                $query1->bindParam(':status', $status, PDO::PARAM_STR);
                $query1->execute();

                //POST DATA TO MAIN TABLE

                $sqlexpses="SELECT * from expenses where expense_id=:eid";
                $query_expenses = $dbh -> prepare($sqlexpses);
                $query_expenses->bindParam(':eid',$expses_id,PDO::PARAM_STR);
                $query_expenses->execute();
                $results_expenses=$query_expenses->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query_expenses->rowCount() > 0)
                {
                    foreach($results_expenses as $rw)
                    {               
                        $amount = $rw->amount;
                        $expense_date =  $rw->expense_date;
                        $brief_description = $rw->brief_description; 
                        $txn_id = $rw->txn_id;
                        $date_created = $rw->date_created;
                        $created_by = $rw->created_by;
                    }
                }

                $service_id = 6;
                $cr_dr = 'C';
                $sqlcntrbn="INSERT into member_contribution(expense_id,payment_type, cr_dr, comments, contribution_amount, date_created, contribution_date,created_by, txn_id) values(:expense_id,:service_id, :cr_dr, :comments, :amount,:date_created, :invoice_date,:created_by,:txn_id)";
                $query_mbr_contrbtn=$dbh->prepare($sqlcntrbn);
                $query_mbr_contrbtn->bindParam(':expense_id',$expses_id,PDO::PARAM_STR);
                $query_mbr_contrbtn->bindParam(':service_id',$service_id,PDO::PARAM_STR);
                $query_mbr_contrbtn->bindParam(':amount',$amount,PDO::PARAM_STR);
                $query_mbr_contrbtn->bindParam(':date_created',$date_created,PDO::PARAM_STR);
                $query_mbr_contrbtn->bindParam(':created_by',$created_by,PDO::PARAM_STR);
                $query_mbr_contrbtn->bindParam(':invoice_date',$expense_date,PDO::PARAM_STR);
                $query_mbr_contrbtn->bindParam(':txn_id',$txn_id,PDO::PARAM_STR);
                $query_mbr_contrbtn->bindParam(':cr_dr',$cr_dr,PDO::PARAM_STR);
                $query_mbr_contrbtn->bindParam(':comments',$brief_description,PDO::PARAM_STR);
                $query_mbr_contrbtn->execute();
                
                $audit_description = "Approved Expense ID (" . $expses_id ." )  ";
                audit_trail($dbh, $audit_description, $logged_inuser);
              }
          } elseif ($select == '2') {//Cancel
              $status = 3;
              foreach ($arr as $expses_id) {
                  $sql="UPDATE expenses SET status=:status where expense_id=:eid";
                  $query2=$dbh->prepare($sql);
                  $query2->bindParam(':eid', $expses_id, PDO::PARAM_STR);
                  $query2->bindParam(':status', $status, PDO::PARAM_STR);
                  $query2->execute();
                 
                  $audit_description = "Cancelled Expense ID (" . $expses_id ." ) ";
                  audit_trail($dbh, $audit_description, $logged_inuser);
              }
          } elseif ($select == '3') { //delete 
            $status = 9;
            foreach ($arr as $expses_id) {
                $sql="UPDATE expenses SET status=:status where expense_id=:eid";
                $query2=$dbh->prepare($sql);
                $query2->bindParam(':eid', $expses_id, PDO::PARAM_STR);
                $query2->bindParam(':status', $status, PDO::PARAM_STR);
                $query2->execute();

                $sql3="UPDATE member_contribution SET status=:status where expense_id=:eid";
                $query2=$dbh->prepare($sql3);
                $query2->bindParam(':eid', $expses_id, PDO::PARAM_STR);
                $query2->bindParam(':status', $status, PDO::PARAM_STR);
                $query2->execute();
                
                $audit_description = "Deleted Expense ID (" . $expses_id ." ) ";
            }
          }
      }
      $url = "expense_list.php";
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
<?php }  ?>