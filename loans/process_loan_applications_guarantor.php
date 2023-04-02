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
	  <title>Badili Sacco | Loan Approval List </title>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
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
                    <h2>Loan Approvals</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                      <form method="post" id="form1" novalidate>
                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
                                  <thead> 
                                    <tr> 
                                        <th>#</th> 
                                        <th>Process</th>
                                        <th>Member Name</th>
                                        <th>Application Date</th>
                                        <th>Loan<br>Amount</th>
                                        <th>Amount<br>Guaranteed</th>
                                        <th>Installment <br>Amount</th>
                                        <th>Payment</br>Period</th> 
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                <tbody>
                                <?php
                                
                               
                                $search_query= " WHERE status=:staus and guaranteed=:guaranteed AND (appl_id IN (SELECT loan_id FROM loan_guarantors WHERE guarantor=:guarantor and status=:gstatus)) ";
                            
                                $staus = "0";
                                $grnteed = 1;
                                $sql="SELECT * from loan_application $search_query order by application_date desc";
                                $query = $dbh -> prepare($sql);
                                $query->bindParam(':staus',$staus,PDO::PARAM_STR);
                                
                                $query->bindParam(':guaranteed',$grnteed,PDO::PARAM_STR);
                                $query->bindParam(':guarantor',$logged_inuser,PDO::PARAM_STR);
                                $query->bindParam(':gstatus',$staus,PDO::PARAM_STR);
                               
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                $total_loan_amount        =   0;
                                $total_repayment_amount   =   0;
                                $total_interest           =   0;
                                if ($query->rowCount() > 0) {
                                foreach ($results as $row) {
                                    $id                   =   $row->appl_id ;
                                    $appl_no              =   $row->appl_no;
                                    $member_id            =   $row->member_id;
                                    $application_date     =   $row->application_date;
                                    $loan_amount          =   $row->loan_amount;
                                    $repayment_amount     =   $row->repayment_amount;
                                    $installment_amount   =   $row->installment_amount;
                                    $repayment_period     =   $row->repayment_period;
                                    $guaranteed           =   $row->guaranteed;
                                    $date_created         =   $row->date_created;
                                    $status               =   $row->status;
                                    $date_reg             =   date("d-m-Y H:i:s",strtotime($date_created));
                                    $interest_amount      =   $repayment_amount - $loan_amount;

                                    $g_array =  check_loan_status($dbh, $id);
                                    //if ($g_array == '0') 
                                    {
                                      if ($status == "0") {
                                        //$status_desc = "PENDING";
                                        $status_desc = '<font color=orange><b>PENDING</b></font>';
                                      } elseif ($status == "1") {
                                        //$status_desc = "APPROVED";
                                        $status_desc = '<font color=green><b>APPROVED</b></font>';
                                      } elseif ($status == "3") {
                                        //$status_desc = "APPROVED";
                                        $status_desc = '<font color=red><b>DECLINED</b></font>';
                                      }
                                      if ($guaranteed == '1') {
                                        $guarantors = $row->guarantors;
                                        $guaranteed_amount = get_guaranteed_amount_fromloanid($dbh, $id);
                                      } else {
                                        $guarantors = 0;
                                        $guaranteed_amount = 0;
                                      }
                                      //check link for approval
                                      if ($guaranteed == '1' && check_loan_status($dbh, $id) >= 1) {
                                        $approve = '<a href="javascript: void(0)" onclick=javascript:poptastic("./approve_loan_guarantor.php?loan_id=' . $id . '",750,800,"approve_loan_guarantee") title="Click to Approve Loan Guarantee" style="text-decoration:none"><B>APPROVE</B></a>';
                                      } else {
                                        $approve = '<a href="javascript: void(0)" onclick=javascript:poptastic("./approve_loan.php?loan_id=' . $id . '",750,800,"approve_loan") title="Click to Approve Loan" style="text-decoration:none"><B>APPROVE</B></a>';
                                      }
                                      $view = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view_loan_details.php?loan_id=' . $id . '","750","800","view_loan_details") title="Click to View" style="text-decoration:none">View Details</a>';
                                      $print_breakdown = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./print_loan_breakdown.php?loan_id=' . $id . '","750","800","print_loan_breakdown") title="Click to View" style="text-decoration:none">Loan Breakdown</a>';
                                      $edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_loan_details.php?editid=' . $id . '","650","600","edit_user_details") title="Click to Edit Loan" style="text-decoration:none">Edit</a>';
                                      //$delete = '<a href="delete_invoice.php?invoice_id='.$row->invoice_id.'" title="Click to Delete" style="text-decoration:none">Delete</a>';
                                      $delete = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./delete_invoice.php?editid=' . $id . '","670","500","delete_invoice") title="Click to Delete " style="text-decoration:none">Delete</a>';
                                      $action = '<div class="input-group-btn">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                                        <li>' . $view . '</li>                              
                                                                    </ul>
                                                                </div>';
                                  ?>
                                  <tr class="active">
                                      <th><?php echo htmlentities($cnt); ?></th>
                                      <td nowrap="nowrap"><?php echo $approve; ?></td>
                                      <td ><?php echo htmlentities(get_membername_fromid($dbh, $member_id)); ?></td>
                                      <td nowrap="nowrap"><?php echo htmlentities(date("d-m-Y", strtotime($application_date))); ?></td>
                                      <td nowrap="nowrap" style="text-align: right;"><?php echo htmlentities(number_format($loan_amount, 2)); ?></td>
                                      <td nowrap="nowrap" style="text-align: right;"><?php echo htmlentities(number_format($guaranteed_amount, 2)); ?></td>
                                      <td nowrap="nowrap" style="text-align: right;"><?php echo htmlentities(number_format($installment_amount, 2)); ?></td>
                                      <td nowrap="nowrap"><?php echo htmlentities($repayment_period); ?></td>
                                      <td nowrap="nowrap"><?php echo ($status_desc); ?></td>
                                      <td id="other"><?php echo $action; ?></td>
                                  </tr>
                                  <?php
                                      $cnt = $cnt + 1;
                                      $total_loan_amount = $total_loan_amount + $loan_amount;
                                      $total_repayment_amount = $total_repayment_amount + $repayment_amount;
                                      $total_interest = $total_interest + $interest_earned;
                                    }
                    }
                    ?>
                   </tbody> 
								  <?php
                  } 
									?>
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
                $sql="UPDATE member_contribution SET status=:status where id=:eid";
                $query1=$dbh->prepare($sql);
                $query1->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                $query1->bindParam(':status', $status, PDO::PARAM_STR);
                $query1->execute();
                $mbr_id = get_memberid_fromcontribution_id($dbh, $cntrb_id);
                $txn_id = get_txnid_fromcontribution_id($dbh, $cntrb_id);
                $fnames = get_membername_fromid($dbh, $mbr_id);
                $audit_description = "Activated Contribution for (" . $fnames ." ) TXN ID :- ".$txn_id." ";
                audit_trail($dbh, $audit_description, $logged_inuser);
              }
          } elseif ($select == '1') {//de-Activate files
              $status = 0;
              foreach ($arr as $cntrb_id) {
                  $sql="UPDATE member_contribution SET status=:status where id=:eid";
                  $query2=$dbh->prepare($sql);
                  $query2->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                  $query2->bindParam(':status', $status, PDO::PARAM_STR);
                  $query2->execute();
                  $mbr_id = get_memberid_fromcontribution_id($dbh, $cntrb_id);
                  $txn_id = get_txnid_fromcontribution_id($dbh, $cntrb_id);
                  $fnames = get_membername_fromid($dbh, $mbr_id);
                  $audit_description = "Cancelled Contribution for (" . $fnames .") TXN ID :- ".$txn_id."";
                  audit_trail($dbh, $audit_description, $logged_inuser);
              }
          } elseif ($select == '2') { //delete clients
            $status = 9;
            foreach ($arr as $cntrb_id) {
                $sql="UPDATE member_contribution SET status=:status where id=:eid";
                $query2=$dbh->prepare($sql);
                $query2->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                $query2->bindParam(':status', $status, PDO::PARAM_STR);
                $query2->execute();
                $mbr_id = get_memberid_fromcontribution_id($dbh, $cntrb_id);
                $txn_id = get_txnid_fromcontribution_id($dbh, $cntrb_id);
                $fnames = get_membername_fromid($dbh, $mbr_id);
                $audit_description = "Deleted Contribution for (" . $fnames .") TXN ID :- ".$txn_id."";
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