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
	<title>Santalink | Client Payment Details </title>
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
	<!-- //js-->

		<style type="text/css">
			@media print {
  				
  				#other{
  				  display: none;
  				}
  				
			}
		</style>
</head> 
<body class="nav-md">
	<div class="container body">
		<div class="main_container">   
						
<?php
$client_id=intval($_GET['client_id']);


	$sql_client="SELECT * from  tblclient WHERE ID= :client_id";
	$query_client = $dbh -> prepare($sql_client);
	$query_client->bindParam(':client_id',$client_id,PDO::PARAM_STR);
	$query_client->execute();
	$results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
									
	foreach ($results_client as $rowclient) 
	{
		$client_name = $rowclient->ContactName;
		$company_name = $rowclient->CompanyName;
		$nationalid = $rowclient->NationalID;
		$family=$rowclient->Family;
		$guarantor=$rowclient->Guarantor;
		$phnumber=$rowclient->Clientphnumber;
		$gphnumber = $rowclient->Guarantorphpnumber;
	}

	?>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="x_panel">
									<div class="x_content">
										<span class="section"> <?php print $client_name;?></span>
							
									<table class="table table-bordered" width="100%" border="1"> 
							<tr>
								<th colspan="6">Client Details</th>	
							</tr>
							 <tr> 
								
								<th>Client Business</th> 
								<td><?php  echo htmlentities($company_name);?></td> 
								<th>ID / Passport No.</th> 
								<td><?php  echo htmlentities($nationalid);?></td>
								<th>Phone Number</th> 
								<td><?php echo  htmlentities($phnumber);?></td> 
							</tr> 
							 <tr> 
								<th>Family</th> 
								<td><?php echo htmlentities($family);?></td> 
								
								<th>Guarantor</th> 
								<td><?php echo  htmlentities($row->guarantor);?></td> 
								<th>Guarantor Contact</th> 
								<td><?php  echo htmlentities($gphnumber);?></td>
							</tr> 

<?php

$sql="SELECT * from  invoices WHERE client_id= :client_id ";
$query = $dbh -> prepare($sql);
$query->bindParam(':client_id',$client_id,PDO::PARAM_STR);
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{
	$client_id = $row->client_id;
	$service_id = $row->service_id;
	$invoice_id = $row->invoice_id;
$cnt=$cnt+1;
}
} 
?>
</table>
<table class="table table-bordered" width="100%" border="1"> 
	<thead>
	<tr>
		<th colspan="10" style="text-align: center;">Client Invoices</th>	
	</tr> 
										<tr> 
											<th style="text-align: center;">#</th> 
											<th style="text-align: center;">Invoice No.</th>
											<th style="text-align: center;">Client Name</th>
									
											<th style="text-align: center;">Invoice Date</th>
											<th style="text-align: center;">Service Charge</th>
											<th style="text-align: center;">Amount</th> 
											<th style="text-align: center;">Repayment<br>Amount</th>
											<th style="text-align: center;">Amount Paid</th> 
											<th style="text-align: center;">Balance</th> 
											<th id="other" style="text-align: center;">Action</th>
									  	</tr>
									</thead>
								<tbody>

								<?php
								$staus = "1";
								$sql="SELECT * from  invoices WHERE status= :staus and client_id=:client_id order by invoice_date desc";
								$query = $dbh -> prepare($sql);
								$query->bindParam(':staus',$staus,PDO::PARAM_STR);
								$query->bindParam(':client_id',$client_id,PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);

								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $row)
								{
									$client_id = $row->client_id;
									$service_id = $row->service_id;
									$invoice_id = $row->invoice_id;
									$invoice_no = $row->invoice_no;

									$sql_client="SELECT ContactName from  tblclient WHERE ID= :client_id";
									$query_client = $dbh -> prepare($sql_client);
									$query_client->bindParam(':client_id',$client_id,PDO::PARAM_STR);
									$query_client->execute();
									$results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
									
									foreach ($results_client as $rowclient) 
									{
										$client_name = $rowclient->ContactName;
									}
									

									$sql_items="SELECT amount_paid from  invoice_items WHERE invoice_id= :invoice_i";
									$query_items = $dbh -> prepare($sql_items);
									$query_items->bindParam(':invoice_i',$invoice_id,PDO::PARAM_STR);
									$query_items->execute();
									$results_items=$query_items->fetchAll(PDO::FETCH_OBJ);
									$total_paid = 0;
									foreach ($results_items as $rs) 
									{
										$amountpaid = $rs->amount_paid;

										$total_paid +=$amountpaid; 
									}

									$amount_borrowed = $row->amount;
									$amount_tobepaid = $row->repayment_amount;

									$balance_amt = $amount_tobepaid - $total_paid;

									
									$view = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./view-invoice.php?invoiceid='.$row->invoice_id.'","670","500","view_invoice") title="Click to View" style="text-decoration:none">View Details</a>';

									$edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_invoice_details.php?editid='.$row->invoice_id.'","670","500","edit_invoice") title="Click to Edit Invoice" style="text-decoration:none">Edit</a>';

									//$makepayments = '<a  class="dropdown-item" href="invoice_payment.php?invoiceid='.$row->invoice_id.'" title="Click to Edit" style="text-decoration:none">Make Payments</a>';

									$makepayments = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./invoice_payment.php?invoiceid='.$row->invoice_id.'","1000","900","invoice_payment") title="Click to Make Payments" style="text-decoration:none">Make Payments</a>';

									$delete = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./delete_invoice.php?invoice_id='.$row->invoice_id.'","670","500","delete_invoice") title="Click to Delete Invoice" style="text-decoration:none">Delete</a>';

									//$delete = '<a  class="dropdown-item" href="delete_invoice.php?invoice_id='.$row->invoice_id.'" title="Click to Delete" style="text-decoration:none">Delete</a>';

									$action = '<div class="input-group-btn" id="other">
												<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
												</button>
                        								<ul class="dropdown-menu dropdown-menu-right" role="menu">

                        									<li>'.$edit.'</li>

                         								   	<li>'.$view.'</li>

                         								   	<li>'.$makepayments.'</li> 

                         								   	<li>'.$delete.'</li>                                                 

                       								 </ul>

                   								 </div>';


									?>
									    <tr class="active">
									      	<th scope="row"><?php echo htmlentities($cnt);?></th>
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
									     ?>

									     <tr class="active">
									      	<th colspan="4" style="text-align: center;">Totals</th>
									       	
									       	<th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_service_charge,2));?></th>
									        <th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_amount,2));?></th>
									       	<th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_repayment_amount,2));?></th> 
									       	<th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($total_total_paid,2));?></th> 
									       	<th style="text-align: right;" nowrap="nowrap"><?php  echo htmlentities(number_format($totla_balance_amt,2));?></th> 
									         
									        <th id="other"></th>
									     </tr>



									     <?php


									 } ?>
									</tbody> 
								</table> 
	
							<div id="other" class="ln_solid">
								<div class="form-group">
									<div class="col-md-6 offset-md-3">
										<button type='button' name="print"  OnClick="window.print();" class="btn btn-primary">Print</button>
										<button type='button' onclick="window.close();" class="btn btn-success">Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="./vendors/validator/multifield.js"></script>
    <script src="./vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
		function poptastic(url, windowWidth, windowHeight,description) {
		// window.open(url, width, height);


			var xPos = (screen.width/2) - (windowWidth/2);
			var yPos = (screen.height/2) - (windowHeight/2);
			window.open(url,description,"width="+ windowWidth+",height="+windowHeight +",left="+xPos+",top="+yPos);
		}
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

    <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="./vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
</body>
</html>
<?php }  ?>