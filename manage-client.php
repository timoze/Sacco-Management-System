<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="./production/images/favicon.ico" type="image/ico" />
    <title>Santalink || Client List</title>
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
                    <h2>Client List</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                      <a href='javascript: void(0)' onclick=javascript:poptastic('./add-client.php',800,1000,'add_client') title='Click to Open Register New Client' style='text-decoration:none'><button class='btn btn-success'>New Client</button></a>
                    
                    <form name="form1" method="post" action="manage-client.php">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead> 
                        <tr> 
                          <th>#</th> 
                          <th>Client Name</th>
                          <th>Client Home</th>
                          <th>Client Contacts</th>
                          <th>National ID/<BR>Passport</th>
                          <th>Client Industry</th>
                          <th>Guarantor <br>Details</th>
                          <th>Status</th>
                          <th class="hidden-print">Action</th>
							            <th class="hidden-print"><input type="checkbox" id="check-all"  onClick='this.value=check(this.form);document.form1.go.disabled=false;' ></th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                        $sql="SELECT * from tblclient $search_query ";
                        $query = $dbh->prepare($sql);
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
                            ?>

                            <tr class="active">									      	
                              <th><?php echo htmlentities($cnt);?></th>								
                              <td><?php  echo htmlentities($row->ContactName);?></td> 
                              <td><?php  echo htmlentities($row->Family);?></td> 
                              <td>Cell No. - <?php  echo htmlentities($row->Clientphnumber);?><br>
                                </td>
                              <td><?php  echo htmlentities($row->NationalID);?></td>
                              <td><?php  echo htmlentities($row->CompanyName);?></td>
                              <td>Name. - <?php  echo htmlentities($row->Guarantor);?><br>
                                Cell - <?php  echo htmlentities($row->Guarantorphnumber);?><br>
                                ID/Passport - <?php echo htmlentities($row->GuarantorID);?></td>
                              <td  style="text-align: center;" nowrap="nowrap"><?php  echo $status;?></td>
                              <td class="hidden-print" style="text-align: center;" nowrap="nowrap"><?php  echo $action;?></td>
                              <td class="hidden-print"><input type="checkbox" id="check-all" class="delete-id" name="chk_id[]" value="<?php echo $row->ID;?>" onClick="document.go.disabled=false"></td>
                              
                          </tr>
                          

									   	<?php 
                       $cnt=$cnt+1;
                       }
                        $number_count = $query->rowCount();
									   	}?>
                       
                      </tbody>
                    </table>
                    

                    <table class="hidden-print" width="100%" border="0">

                      <tr>
                        <td width="80%">&nbsp;</td>
                        <td nowrap="nowrap" align=right>
                          <select name="selects">
                            <option value="0">Activate Client(s)</option>
                            <option value="1">Deactivate Client(s)</option>
                            <option value="2">Delete Client(s)</option>
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