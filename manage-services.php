<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | Manage Services </title>
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
                    <h2>Manage Services</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
							<a href='javascript: void(0)' onclick=javascript:poptastic('./add-services.php',850,400,'add_client_services') title='Click to Open Register New Client' style='text-decoration:none'><button class='btn btn-success'>New Service</button></a>
							
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
									<thead> 
										<tr> 
											<th>#</th> 
											<th>Service Name</th>
											<th nowrap="nowrap">Service Charge</th> 
											<th nowrap="nowrap">Installment Rate (%)</th>
											<th nowrap="nowrap">Payment Frequency (Days)</th>
											<th nowrap="nowrap">Date Created</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									    <?php
									    $status = "1";
										$sql="SELECT * from services where status=:status ";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':status',$status,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);

										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $row)
											{               
												?>
												<tr class="active">
													<th scope="row"><?php echo htmlentities($cnt);?></th>
													<td><?php  echo htmlentities($row->service_description);?></td>
													<td nowrap="nowrap" style="text-align: right;"><?php  echo number_format(htmlentities($row->service_charge), 2);?></td>
													<td nowrap="nowrap" style="text-align: center;"><?php  echo htmlentities($row->instalment_rate);?></td> 
													<td nowrap="nowrap" style="text-align: center;"><?php  echo htmlentities($row->payment_frequency);?></td>
													<td nowrap="nowrap"><?php  echo htmlentities($row->date_created);?></td>
														
													<td>
													<a href='javascript: void(0)' onclick=javascript:poptastic('edit-services-details.php?editid=<?php echo $row->service_id;?>',700,400,'edit_client_services') title='Click to Update Service Details' style='text-decoration:none'><button class='btn btn-success'>Edit</button></a>
													
													</td>
												</tr>
									     		<?php 
												 $cnt=$cnt+1;
											}
										} 
										?>
									</tbody> 
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