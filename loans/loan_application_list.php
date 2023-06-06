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
	  <title>Badili Sacco | Loan List </title>
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
                    <h2>Loan Application List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box ">
                      <a href='javascript: void(0)' onclick=javascript:poptastic('./new_loan_application.php',700,600,'new_loan_application') title='Click to Apply Member Loan' style='text-decoration:none'><button class='btn btn-success'>New Loan Application</button></a>
                      <a href='javascript: void(0)' onclick=javascript:poptastic('./new_loan_application_old.php',700,600,'new_loan_application') title='Click to Apply Member Loan' style='text-decoration:none'><button class='btn btn-success'>Old Loan Application</button></a>
                      <form method="post" id="form1" novalidate>
								<table id="loan_appl_list" class="table table-striped table-bordered" style="width:100%"> 
									<thead> 
										<tr> 
											<th>#</th> 
											<th>Member Name</th>
											<th>Application Date</th>
											<th>Loan<br>Amount</th>
                      <th>Repayment<br>Amount</th>
                      <th>Interest<br>Amount</th>
											<th>Installment <br>Amount</th>
                      <th>Payment</br>Period</th> 
                      <th>Amount<br>Guaranteed</th>
                      <th>Amount<br>Paid</th>
                      <th>Status</th>
                      <th id="other">Action</th>
                      <th id="other"></th>
									  </tr>
									</thead>
								<tbody>
								<?php
								if($user_department != 5)
								{ 
									//$client_name=$_POST['client_name']; 
									$search_query = " WHERE member_id=:loggeduser ";
								}
								else{
									$search_query= "";
                 // $crdrquery = " WHERE cr_dr=:crdr";
								}
								$staus = "1";
           // $cr_dr = "D";
								$sql="SELECT * from  loan_application $search_query  order by application_date desc";
								$query = $dbh -> prepare($sql);
								//$query->bindParam(':staus',$staus,PDO::PARAM_STR);
                if($user_department != 5)
								{ 
                  $query->bindParam(':loggeduser',$logged_inuser,PDO::PARAM_STR);
                }
                //$query->bindParam(':crdr',$logged_inuser,PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								$total_loan_amount        =   0;
                $total_repayment_amount   =   0;
                $total_interest           =   0;
                $total_total_payments     =   0;
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

                    $total_payments       =   member_loan_payments($member_id, $id);
                    if ($status=="0") {
                      //$status_desc = "PENDING";
                      $status_desc = '<font color=orange><b>PENDING</b></font>';
                    }elseif($status=="1"){
                      //$status_desc = "APPROVED";
                      $status_desc = '<font color=green><b>APPROVED</b></font>';
                      if($total_payments>=$repayment_amount){
                        $status_desc = '<font color=green><b>APPROVED<br>Fully Paid</b></font>';
                      }
                    }elseif($status=="3"){
                      //$status_desc = "APPROVED";
                      $status_desc = '<font color=red><b>CANCELLED</b></font>';
                    }
                    if ($guaranteed == '1') {
                      $guarantors           =   $row->guarantors;
                      $guaranteed_amount = get_guaranteed_amount_fromloanid($dbh, $id);
                      $sqlq="SELECT amount from  loan_guarantors where loan_id=:loan_id";
								      $queryq = $dbh -> prepare($sqlq);
                      $queryq->bindParam(':staus',$staus,PDO::PARAM_STR);
                    }
                    else {
                        $guarantors = 0;
                        $guaranteed_amount = 0;
                    }

                    $load = "";
                    $edit = "";
                    if ($status=="0") {
                      //$status_desc = "PENDING";
                      $load = '<input type="checkbox" id="check-all" class="delete-id" name="chk_id[]" value="'.$id.'" onClick="document.go.disabled=false">';
                      $edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_loan_details.php?editid='.$id.'","650","600","edit_user_details") title="Click to Edit Loan" style="text-decoration:none">Edit</a>';
                    }
                    $view = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view_loan_details.php?loan_id='.$id.'","750","800","view_loan_details") title="Click to View" style="text-decoration:none">View Details</a>';
                    $print_breakdown = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./print_loan_breakdown.php?loan_id='.$id.'","750","800","print_loan_breakdown") title="Click to View Loan Breakdown" style="text-decoration:none">Loan Breakdown</a>';
                    if ($status=="1") {
                      $print_loan_schedule = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./print_loan_schedule.php?loan_id='.$id.'","750","800","print_loan_schedule") title="Click to View Loan Schedule" style="text-decoration:none">Loan Schedule</a>';
                      $loan_schedule = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./loan_schedule.php?loan_id='.$id.'","750","800","loan_repayments") title="Click to View Loan Repayments" style="text-decoration:none">Repayments</a>';
                    }else{
                      $print_loan_schedule = '';
                      $loan_schedule = '';
                    }
                    
                    //$delete = '<a href="delete_invoice.php?invoice_id='.$row->invoice_id.'" title="Click to Delete" style="text-decoration:none">Delete</a>';
                    $delete = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./delete_invoice.php?editid='.$id.'","670","500","delete_invoice") title="Click to Delete " style="text-decoration:none">Delete</a>';
                    $action = '<div class="input-group-btn">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
                                        </button>
                                          <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <li>'.$edit.'</li>
                                                        <li>'.$view.'</li>
                                                        <li>'.$print_loan_schedule.'</li>
                                                        <li>'.$loan_schedule.'</li>
                                                        <li>'.$print_breakdown.'</li>                                
                                                    </ul>
                                                </div>';
                    ?>
                            <tr class="active">
                                <th><?php echo htmlentities($cnt);?></th>
                                <td ><?php  echo htmlentities(get_membername_fromid($dbh,$member_id));?></td>
                                <td ><?php  echo htmlentities(date("d-m-Y",strtotime($application_date)));?></td>
                                <td  style="text-align: right;"><?php  echo htmlentities(number_format($loan_amount,2));?></td>
                                <td  style="text-align: right;"><?php  echo htmlentities(number_format($repayment_amount,2));?></td>
                                <td  style="text-align: right;"><?php  echo htmlentities(number_format($interest_amount,2));?></td>
                                <td  style="text-align: right;"><?php  echo htmlentities(number_format($installment_amount,2));?></td>
                                <td ><?php  echo htmlentities($repayment_period);?></td>
                                <td  style="text-align: right;"><?php  echo htmlentities(number_format($guaranteed_amount,2));?></td>
                                <td  style="text-align: right;"><?php  echo htmlentities(number_format($total_payments,2));?></td>
                                <td ><?php  echo ($status_desc);?></td>
                                <td id="other"><?php echo $action;?></td>
                                <td class="hidden-print"><?php echo $load;?></td>
                            </tr>
                            <?php 
                            $cnt=$cnt+1;
                            $total_loan_amount = $total_loan_amount +$loan_amount;
                            $total_repayment_amount = $total_repayment_amount + $repayment_amount;
                            $total_interest = $total_interest + $interest_earned;
                            $total_total_payments = $total_total_payments + $total_payments;
                    }
                    ?>
                   </tbody> 
                        <tr class="active">
                            <th></th>
                            <th ></th>
                            <th >Total :</th>
                            <th  style="text-align: right;"><?php  echo htmlentities(number_format($total_loan_amount,2));?></th>
                            <th  style="text-align: right;"><?php  echo htmlentities(number_format($total_repayment_amount,2));?></th>
                            <th  style="text-align: right;"><?php  echo htmlentities(number_format($total_interest,2));?></th>
                            <th  ></th> 
                            <th ></th> 
                            <th > </th>
                            
                            <th  style="text-align: right;"><?php  echo htmlentities(number_format($total_total_payments,2));?></th>
                            <th > </th>             
                            <th id="other"></th>
                            <th id="other"></th>
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
                            <td  align=right>
                              <select name="selects">
                                <option value="1">Delete</option>
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
          if ($select == '1') {//de-Activate files
              $status = 0;
              foreach ($arr as $cntrb_id) {
                  $sql="DELETE FROM loan_application where appl_id=:eid";
                  $query2=$dbh->prepare($sql);
                  $query2->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                  $query2->execute();

                  $sql2="DELETE FROM loan_guarantors where loan_id=:eid";
                  $query3=$dbh->prepare($sql2);
                  $query3->bindParam(':eid', $cntrb_id, PDO::PARAM_STR);
                  $query3->execute();
                  
                  $audit_description = "Deleted Loan Application ID ".$cntrb_id." ";
                  audit_trail($dbh, $audit_description, $logged_inuser);
              }
          } 
      }
      $url = "loan_application_list.php";
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

    <script type="text/javascript" src="../vendors/datatables.net-pdfmake/pdfmake.min.js"></script>
 
<script type="text/javascript" src="../vendors/datatables.net-vfs_fonts/vfs_fonts.js"></script>


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
          var table = $('#loan_appl_list').DataTable( {
              processing: true,
              responsive: false,
              dom: 'Bfrtip',
              buttons: [
                  {
                      extend: 'copy',
                      exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10]
                      }
                  } 
                  ,    
                  {
                      extend: 'csv',
                      exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10]
                      }
                  } 
                  ,  
                  {
                      extend: 'excel',
                      exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10]
                      }
                  }
                  ,  
                  {
                      extend: 'pdf',
                      exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10]
                      },
                      orientation: 'landscape',
                      pageSize: 'LEGAL'
                  },  
                  {
                      extend: 'print',
                      exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10]
                      }
                  }
              ],
              pageLength : 0,
              lengthMenu: [10, 25, 50, 'All']
          } );
      } );
      
     
  </script>
  </body>
</html>
<?php }  ?>