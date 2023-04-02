<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/functions.php');

if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{

  	if (isset($_REQUEST['date_from'])) {
  		$date1 = date('Y-m-d',strtotime($_REQUEST['date_from']));
  	}else{
  		$date1 = date('Y-01-01');
  	}

  	if (isset($_REQUEST['date_to'])) {
  		$date2 = date('Y-m-d',strtotime($_REQUEST['date_to']));
  	}else{
  		$date2 = date('Y-m-d');
  	}

  	if (strtotime($date1)==strtotime($date2)) {
  		$desc = "On ". date('d-m-Y', strtotime($date1)); 
  	}else{
  		$desc = "From: " .date("d-m-Y",strtotime($date1))." to ". date("d-m-Y", strtotime($date2));
  	}
	$client_name = get_clientname_fromid($dbh, $_REQUEST['client_id']);
    if ($client_name) {
      $client_id_g = $_REQUEST['client_id'];
      $client_name = get_clientname_fromid($dbh, $_REQUEST['client_id']);
      $desc .= "<br>Client : ".$client_name;
    }

  	   
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | Payments Received</title>
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
                    <h2>Amount Received <?php echo $desc; ?></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                           
						<?php
						if(isset($_POST['search']))
						{ 

							$date_from=$_POST['date_from'];
							$date_to=$_POST['date_to'];

							$url = "clients_payments.php?date1=$date_from&date2=$date_to";

							
							print "<script language='javascript'>window.location.href = '".$url."';</script>";

							

						}
						?>
						<div class="graph">
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
									<thead> 
										<tr> 
											<th>#</th> 
											<th>Client Name</th>
											<th>Client Home</th>
											<th>Client Contacts</th>
									 		<th>Amount<br>Received</th>
								
									 		<th>Action</th>
									  	</tr>
									</thead>
							<tbody>
<?php


/*
$limit = 50;
$quer = "SELECT * FROM tblclient";

$s = $dbh->prepare($quer);
//$s->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
$s->execute();
$total_results = $s->rowCount();
$total_pages = ceil($total_results/$limit);
//print $total_results;

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}

*/

$starting_limit = ($page-1)*$limit;

if ($client_id_g) {
    $sql="SELECT * from tblclient where ID=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':eid', $client_id_g, PDO::PARAM_STR);
}else {
	$sql="SELECT * from tblclient";
    $query = $dbh->prepare($sql);
}

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{

	$stat = htmlentities($row->Status); 
	if ($stat =="1") {
		$status = '<font color=green><b>Active</b></font>';   
	}
	else
	{
		$status = '<font color=orange><b>In-Active</b></font>';   
	}

	$i=$cnt-1;
	$client_bal = getClientpayments($row->ID, $date1, $date2, $dbh);
	//$client_balance = $client_bal[0]-$client_bal[1];
	$view_details = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view_client_invoice.php?client_id='.$row->ID.'",900,800,"view_client_invoice") title="Click to View Client Payment Detail" style="text-decoration:none">View Payments</a>';

	$print = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view_client_details.php?client_id='.$row->ID.'",900,800,"view_client_details") title="Click to View Client Details" style="text-decoration:none">Print</a>';
					
	$client_passport = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./client_passport.php?client_id='.$row->ID.'",900,800,"client_passport") title="Click to Upload Client Passport" style="text-decoration:none">Upload Passport</a>';

	$edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit-client-details.php?editid='.$row->ID.'",900,800,"edit-client-details") title="Click to View" style="text-decoration:none">Edit Details</a>';

	$action = '<div class="input-group-btn">
													<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
													</button>
													<ul class="dropdown-menu dropdown-menu-right" role="menu">
														<li>'.$edit.'</li>
														<li>'.$client_passport.'</li>  
														<li>'.$view_details.'</li>   
														<li>'.$print.'</li>                                           
													</ul>
											</div>';
                    if ($client_bal>0) 
                    {
                    	
                    ?>
									     <tr class="active">
									      	
									      	<th scope="row"><?php echo htmlentities($cnt);?></th>
									      
									        <td><?php  echo htmlentities($row->ContactName);?></td> 
									        <td><?php  echo htmlentities($row->Family);?></td> 
									        <td>Cell No. - <?php  echo htmlentities($row->Clientphnumber);?><br>
									        	 </td>

									       	<td style="text-align: right;"><?php print number_format($client_bal,2);?></td>
									        

									        <td style="text-align: center;" nowrap="nowrap"><?php  echo $action;?></td>
									        
									     </tr>

										<input type=hidden name=client_id'<?php echo $row->ID;?>' value="">

									   	<?php 
									   	$cnt=$cnt+1;

									   	$total_received += $client_bal; 
                    				
                    				}

									}
									?>
									</tbody>
									<tfoot>
											<tr class="active">
													
													<th colspan="4" style="text-align: center;">Total Received</th>
												
													<th style="text-align: right;"><?php print number_format($total_received,2);?></th>
													

													<th>&nbsp;</th>
													
												</tr>

												<?php



												}?>
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
    if ($_POST['go']) {
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
    } ?>
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
<?php
  }  ?>