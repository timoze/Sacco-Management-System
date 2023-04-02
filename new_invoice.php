<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/functions.php');

if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$query_invoice_no="SELECT invoice_no from ser01 ";
$query_invoice_no = $dbh -> prepare($query_invoice_no);
$query_invoice_no->execute();
$result_invoice_no = $query_invoice_no->fetchAll(PDO::FETCH_OBJ);

//$result_invoice = $row_service;
foreach($result_invoice_no  as $row_invoice)
{
	$invoice_no = $row_invoice->invoice_no;
}


 $client_id 			=	$_POST['client_id'];
 $service_id 			=	$_POST['service_id'];
 $amount 				=	$_POST['amount'];
 $repayment_amount		=	$_POST['repayment_amount'];
 $repayment_startdate	=	date("Y-m-d", strtotime($_POST['repayment_startdate']));
 $invoice_date 			=	date("Y-m-d", strtotime($_POST['invoice_date']));

 $date_created 			=	date("Y-m-d H:i:s");


$query_scharge="SELECT service_charge from services where service_id=:service_id ";
$query_scharge = $dbh -> prepare($query_scharge);
$query_scharge->bindParam(':service_id',$service_id,PDO::PARAM_STR);
$query_scharge->execute();
$result_scharge = $query_scharge->fetchAll(PDO::FETCH_OBJ);

//$result_invoice = $row_service;
foreach($result_scharge  as $row_charge)
{
	$service_charge_amt = $row_charge->service_charge;
}

 
 
$sql="INSERT into invoices(client_id,service_id, amount, repayment_amount, repayment_startdate, date_created, invoice_date, invoice_no, service_charge) values(:client_id,:service_id, :amount, :repayment_amount,:repayment_startdate,:date_created, :invoice_date,:invoice_no,:scharge)";
$query=$dbh->prepare($sql);
$query->bindParam(':client_id',$client_id,PDO::PARAM_STR);
$query->bindParam(':service_id',$service_id,PDO::PARAM_STR);
$query->bindParam(':amount',$amount,PDO::PARAM_STR);
$query->bindParam(':repayment_amount',$repayment_amount,PDO::PARAM_STR);
$query->bindParam(':repayment_startdate',$repayment_startdate,PDO::PARAM_STR);
$query->bindParam(':date_created',$date_created,PDO::PARAM_STR);
$query->bindParam(':invoice_date',$invoice_date,PDO::PARAM_STR);
$query->bindParam(':invoice_no',$invoice_no,PDO::PARAM_STR);
$query->bindParam(':scharge',$service_charge_amt,PDO::PARAM_STR);

$query->execute();

$LastInsertId=$dbh->lastInsertId();

$invoice_id = $LastInsertId;

$new_inv_no = $invoice_no+1;

$sql_update_inv_no="update ser01 set invoice_no=:invoice_no";
$query_updte_inv_no=$dbh->prepare($sql_update_inv_no);
$query_updte_inv_no->bindParam(':invoice_no',$new_inv_no,PDO::PARAM_STR);
$query_updte_inv_no->execute();

$query_service="SELECT instalment_rate, payment_frequency from services where service_id=:service_id";
$query_service = $dbh -> prepare($query_service);
$query_service->bindParam(':service_id',$service_id,PDO::PARAM_STR);
$query_service->execute();
$result_invoice=$query_service->fetchAll(PDO::FETCH_OBJ);

//$result_invoice = $row_service;
foreach($result_invoice as $row_service)
{ 

	$rte = $row_service->instalment_rate;

	$rate = $rte + 2;

	$frequency = $row_service->payment_frequency;

}

$amount_per_installment = $repayment_amount/$rate;

$count = 0;

for ($k=0; $k < round($rate); $k++) 
{ 
	//$count = $frequency+$count; 
	if ($k==0) 
	{
		$count = 0;
	 	
	} 
	else{
		$count = $frequency+$count; 
	}
    $is_sunday = date('l', strtotime("$count days",strtotime($repayment_startdate)));
    if($is_sunday == "Sunday")
    {
        $count=$count+1;
    }
    $date_input = date('Y-m-d', strtotime("$count days",strtotime($repayment_startdate)));


    $sql_invoice_items="INSERT into invoice_items(invoice_id,amount, repayment_date) values(:invoice_id,:amount_per_installment, :date_input)";
	$query_iems=$dbh->prepare($sql_invoice_items);
	$query_iems->bindParam(':invoice_id',$invoice_id,PDO::PARAM_STR);
	$query_iems->bindParam(':amount_per_installment',$amount_per_installment,PDO::PARAM_STR);
	$query_iems->bindParam(':date_input',$date_input,PDO::PARAM_STR);

	$query_iems->execute();

}



   if ($LastInsertId>0) {


    echo '<script>alert("Invoice has been added.")</script>';
	echo "<script>window.location.href ='new_invoice.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | New Invoice</title>

	<!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <form method="post" novalidate>
                                        
                                        <span class="section">New Invoice</span>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Invoice Date<span class="required">*</span></label>
												<div class="col-md-6 col-sm-6">
													<input class="form-control datepick" name="invoice_date" value="<?php echo date('d-m-Y');?>" required="required" />
												</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Client<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<select name="client_id" id="client_id" placeholder="Select Client ..." class="form-control client_id" required='true'>
													<option value=""></option>
													<?php
														$staus = "1";
														$sqclients="SELECT ContactName, ID from tblclient where status=:staus";
														$query_clients = $dbh -> prepare($sqclients);
														$query_clients->bindParam(':staus',$staus,PDO::PARAM_STR);
														$query_clients->execute();
														$result_clients=$query_clients->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query_clients->rowCount() > 0)
														{
															foreach($result_clients as $row_clients)
															{  
																$clientid = $row_clients->ID;
																$client_bal = getClientbalance($clientid, $dbh);
																if ($client_bal<=0) 
																{
																	?>
																	<option value="<?php  echo $row_clients->ID;?>"><?php  echo $row_clients->ContactName;?></option>
															
																	<?php 
																}
																$cnt=$cnt+1;
															}
														} 
													?>
												</select>  
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Service<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<select name="service_id" id="service_id" placeholder="Select Service Category ..." class="form-control service_id" required='true'>	
													<option value=""></option>
													<?php
														$staus = "1";
														$sql_services="SELECT service_description, service_id, instalment_rate from services where status=:staus";
														$query_services = $dbh -> prepare($sql_services);
														$query_services->bindParam(':staus',$staus,PDO::PARAM_STR);
														$query_services->execute();
														$result_services=$query_services->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query_services->rowCount() > 0)
														{
															foreach($result_services as $row_services)
															{  ?>
																<option value="<?php  echo $row_services->service_id;?>"><?php  echo $row_services->service_description;?> ===> Rate (<?php  echo $row_services->instalment_rate;?>% per installment)</option>
															
																<?php 
																$cnt=$cnt+1;
															}
														} 
													?>
												</select>   
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Amount Given <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="number" class='number' name="amount" required='required' value=""></div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Amount to Be Paid <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="number" class='number' name="repayment_amount" required='required' value=""></div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Repayment Start Date<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control datepick2" name="repayment_startdate" value="<?php echo date('d-m-Y');?>" required="required" />
											</div>
										</div>
										<div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
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
    <script src="./vendors/jquery/dist/jquery-3.5.0.min.js"></script>
	<script src="./vendors/jquery/dist/jquery-ui.js"></script>
	<link href="./vendors/jquery/dist/jquery-ui.css" rel='stylesheet' type='text/css' />
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
	<script  type="text/javascript">
		$( function() {
					$(".datepick" ).datepicker({ dateFormat: 'dd-mm-yy'
					});
					$(".datepick2" ).datepicker({ dateFormat: 'dd-mm-yy'
					});
				});
	</script>

</body>

</html>
<?php
  }
 ?>
