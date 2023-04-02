<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/functions.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	  <title>Santalink | Invoice List </title>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="./vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="./vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="./vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="./vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="./vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <div class="row">
          <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Invoice List</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                      <a href='javascript: void(0)' onclick=javascript:poptastic('./new_invoice.php',700,500,'new_invoice') title='Click to Add New Invoice' style='text-decoration:none'><button class='btn btn-success'>New Invoice</button></a>
                    
                    
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
									<thead> 
										<tr> 
											<th>#</th> 
											<th>Invoice No.</th>
											<th>Client Name</th>
											<th>Invoice Date</th>
											<th>Service Charge</th>
											<th>Amount</th> 
											<th>Repayment<br>Amount</th>
											<th>Amount Paid</th> 
											<th>Balance</th> 
											<th id="other">Action</th>
									  	</tr>
									</thead>
								<tbody>
								<?php
								if(isset($_POST['search']))
								{ 
									$client_name=$_POST['client_name']; 
								
									$search_query = " AND client_id IN (SELECT ID FROM tblclient WHERE ( (NationalID like '%$client_name%' OR ContactName like '%$client_name%' ) )) ";
								}
								else{
									$search_query= "";
								}
								$staus = "1";
								$sql="SELECT * from  invoices WHERE status= :staus $search_query order by invoice_date desc";
								$query = $dbh -> prepare($sql);
								$query->bindParam(':staus',$staus,PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);

								$cnt=1;
								$total_service_charge 	=	0;
								$total_amount 			=	0;
								$total_repayment_amount =	0;
								$total_total_paid 		=	0;
							 	$totla_balance_amt 		=	0;
								if($query->rowCount() > 0)
								{
								foreach($results as $row)
								{
									$client_id = $row->client_id;
									$service_id = $row->service_id;
									$invoice_id = $row->invoice_id;
									$invoice_no = $row->invoice_no;

							
                  $client_name = get_clientname_fromid($dbh, $client_id);
                  $total_paid = get_amount_paid($dbh, $invoice_id);

									$amount_borrowed = $row->amount;
									$amount_tobepaid = $row->repayment_amount;

									$balance_amt = $amount_tobepaid - $total_paid;

									//$view = '<a href="view-invoice.php?invoiceid='.$row->invoice_id.'" title="Click to View" style="text-decoration:none">View</a>';

									//$edit = '<a href="edit_invoice_details.php?editid='.$row->invoice_id.'" title="Click to Edit" style="text-decoration:none">Edit</a>';

									//$makepayments = '<a href="invoice_payment.php?invoiceid='.$row->invoice_id.'" title="Click to Edit" style="text-decoration:none">Make Payments</a>';
									$view = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view-invoice.php?invoiceid='.$row->invoice_id.'","670","500","view_invoice") title="Click to View" style="text-decoration:none">View Details</a>';
									$edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_invoice_details.php?editid='.$row->invoice_id.'","670","500","edit_invoice") title="Click to Edit Invoice" style="text-decoration:none">Edit</a>';
									$makepayments = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./invoice_payment.php?invoiceid='.$row->invoice_id.'","1000","900","invoice_payment") title="Click to Make Payments" style="text-decoration:none">Make Payments</a>';
                  
                  
									//$delete = '<a href="delete_invoice.php?invoice_id='.$row->invoice_id.'" title="Click to Delete" style="text-decoration:none">Delete</a>';
									$delete = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./delete_invoice.php?invoice_id='.$row->invoice_id.'","670","500","delete_invoice") title="Click to Delete " style="text-decoration:none">Delete</a>';

									$action = '<div class="input-group-btn">
													<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
													</button>
														<ul class="dropdown-menu dropdown-menu-right" role="menu">
                        									<li>'.$edit.'</li>
                                          <li>'.$view.'</li>
                                          <li>'.$makepayments.'</li>   
                                          <li>'.$delete.'</li>                                               
                       								 </ul>
                   								 </div>';

                   					if ($balance_amt>0) {
                   						

									?>
									    <tr class="active">
									      	<th><?php echo htmlentities($cnt);?></th>
									       	<td><?php  echo htmlentities($invoice_no);?></td>
									       	<td style="width: 40%"><?php  echo htmlentities($client_name);?></td>
									       	<td nowrap="nowrap"><?php  echo htmlentities(date('d-m-Y',strtotime($row->invoice_date)));?></td>
									       	<td style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($row->service_charge,2));?></td>
									        <td style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($row->amount,2));?></td>
									       	<td style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($row->repayment_amount,2));?></td> 
									       	<td style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_paid,2));?></td> 
									       	<td style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($balance_amt,2));?></td> 
									         
									        <td id="other"><?php echo $action;?></td>
									     </tr>

									     <?php $cnt=$cnt+1;

									     $total_service_charge += $row->service_charge;
									     $total_amount += $row->amount;
									     $total_repayment_amount += $row->repayment_amount;
									     $total_total_paid += $total_paid;
									     $totla_balance_amt += $balance_amt;
									 }
									 }
									 ?>
                   </tbody> 
                   <tfoot>

									     <tr class="active">
                         
									      	<th colspan="4" style="text-align: center;">Totals</th>
									       	
									       	<th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_service_charge,2));?></th>
									        <th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_amount,2));?></th>
									       	<th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_repayment_amount,2));?></th> 
									       	<th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_total_paid,2));?></th> 
									       	<th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($totla_balance_amt,2));?></th> 
									         
									        <th id="other"></th>
									     </tr>
									    <?php } 
									?>


									     </tfoot> 
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
              print $status;
              foreach ($arr as $client_id) {
                $sql="UPDATE tblclient SET status=:status where ID=:eid";
                $query1=$dbh->prepare($sql);
                $query1->bindParam(':eid', $client_id, PDO::PARAM_STR);
                $query1->bindParam(':status', $status, PDO::PARAM_STR);
                $query1->execute();
              }
          } elseif ($select == '1') {//de-Activate files
              $status = 0;
              foreach ($arr as $client_id) {
                  $sql="UPDATE tblclient SET status=:status where ID=:eid";
                  $query2=$dbh->prepare($sql);
                  $query2->bindParam(':eid', $client_id, PDO::PARAM_STR);
                  $query2->bindParam(':status', $status, PDO::PARAM_STR);
                  $query2->execute();
              }
          } elseif ($select == '2') { //delete clients
            foreach ($arr as $client_id) {
                $sql="DELETE from tblclient where ID=:eid";
                $query3=$dbh->prepare($sql);
                $query3->bindParam(':eid', $client_id, PDO::PARAM_STR);
                $query3->execute();
            }
          }
      }
       
      $url = "manage-client.php";
      print "<script language='javascript'>window.location.href = '" . $url . "';</script>";
    }

?>
    <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="./vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="./vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="./vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="./vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="./vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="./vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="./vendors/jszip/dist/jszip.min.js"></script>
    <script src="./vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="./vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>

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