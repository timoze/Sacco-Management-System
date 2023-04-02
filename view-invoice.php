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
	<title>Santalink | Invoice Details </title>
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
				$invid=intval($_GET['invoiceid']);


				$sql="SELECT * from  invoices WHERE invoice_id= :invoiceid ";
				$query = $dbh -> prepare($sql);
				$query->bindParam(':invoiceid',$invid,PDO::PARAM_STR);
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

					$sql_client="SELECT ContactName, CompanyName, NationalID, Family from  tblclient WHERE ID= :client_id";
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
					}

					?>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="x_panel">
								<div class="x_content">
									<span class="section">Invoice Details - Invoice #<?php echo $invid;?></span>
									<table class="table table-bordered" width="100%" border="1"> 
										<tr>
											<th colspan="6">Client Details</th>	
										</tr>
										<tr> 
											<th>Client Name</th> 
											<td><?php  echo htmlentities($client_name);?></td>
											<th>Client Business</th> 
											<td><?php  echo htmlentities($company_name);?></td> 
											<th>ID / Passport No.</th> 
											<td><?php  echo htmlentities($nationalid);?></td>
										</tr> 
										<tr> 
											<th>Family</th> 
											<td><?php echo htmlentities($family);?></td> 
											<th>Invoice Date</th> 
											<td colspan="3"><?php echo  htmlentities(date("d-m-Y",strtotime($row->invoice_date)));?></td> 
										</tr> 
										<?php 
										$cnt=$cnt+1;
										}	
									} 
								?>
								</table>
								<table class="table table-bordered" width="100%" border="1"> 
									<tr>
										<th colspan="6" style="text-align: center;">Invoice Repayment Schedules</th>	
									</tr>
									<tr>
										<th>#</th>	
										<th>Expected<br>Payment Date</th>
										<th>Installment<br>Amount</th>
										<th>Amount <br>Paid</th>
										<th>Balance<br>Amount</th>
										<th>Date<br> Paid</th>
									</tr>

									<?php
									$ret="SELECT * FROM invoice_items where invoice_id=:invid";
									$query1 = $dbh -> prepare($ret);
									$query1->bindParam(':invid',$invid,PDO::PARAM_STR);
									$query1->execute();

									$rs=$query1->fetchAll(PDO::FETCH_OBJ);

									$cnt=1;
									if($query1->rowCount() > 0)
									{
										foreach($rs as $row1)
										{               
											?>

												<tr>
													<th><?php echo $cnt;?></th>
													<td nowrap="nowrap"><?php echo date("d-m-Y",strtotime($row1->repayment_date));?></td>	
													<td style="text-align: right;" nowrap="nowrap"><?php echo number_format($row1->amount,2);?></td>
													<td style="text-align: right;" nowrap="nowrap"><?php echo number_format($row1->amount_paid,2);?></td>
													<td style="text-align: right;" nowrap="nowrap"><?php echo number_format(($row1->amount-$row1->amount_paid),2);?></td>
													<td style="text-align: center;" nowrap="nowrap"><?php echo date("d-m-Y",strtotime($row1->date_paid));?></td>
												</tr>

											<?php $cnt=$cnt+1;
											//$gtotal+=$subtotal;
										$total_amounts += $row1->amount;
										$total_payments += $row1->amount_paid;
										}
										
									} 
									?>

								<tr>
									<th colspan="2" style="text-align:center">Totals</th>
									<th style="text-align: right;"><?php echo number_format($total_amounts,2);?></th>
									<th style="text-align: right;"><?php echo number_format($total_payments,2);?></th>
									<th style="text-align: right;"><?php echo number_format(($total_amounts-$total_payments),2);?></th>		
									<th>&nbsp;</th>
								</tr>
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