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
	<title>Client Management System || Invoice Payment </title>
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

	$sql_client="SELECT ContactName from  tblclient WHERE ID= :client_id";
	$query_client = $dbh -> prepare($sql_client);
	$query_client->bindParam(':client_id',$client_id,PDO::PARAM_STR);
	$query_client->execute();
	$results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
									
	foreach ($results_client as $rowclient) 
	{
		$client_name = $rowclient->ContactName;
	}
 }
}


	?>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="x_panel">
									<div class="x_content">
										 <span class="section">Invoice #<?php echo $invid;?> for <?php echo $client_name;?></span>
									
<table class="table table-bordered" width="100%" border="1"> 
	<tr>
		<th colspan="8" style="text-align: center;">Invoice Repayment Schedules</th>	
	</tr>
	<tr>
		<th>#</th>	
		<th>Serial<br>No.</th>
		<th>Expected<br>Payment Date</th>
		<th>Installment<br>Amount</th>
		<th>Amount <br>Paid</th>
		<th>Date<br> Paid</th>
		<th>Update <br>Payments</th>
		<th>Action</th>
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
			$datepai =    $row1->date_paid;
			if ($datepai== "0000-00-00" || $datepai=="") 
			{
			    $datepaid = date("Y-m-d");
			         
			}
			else
			{
				$datepaid = $datepai;
			} 

			//$edit = '<a href="edit_payment_details.php?id='.$row1->id.'" title="Click to Edit" style="text-decoration:none">Edit</a>';
			//$delete = '<a href="delete_payment_details.php?invoice_id='.$invid.'&id='.$row1->id.'" title="Click to Edit" style="text-decoration:none">Delete</a>';

			$delete = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./delete_payment_details.php?invoice_id='.$invid.'&id='.$row1->id.'","670","500","delete_payment_details") title="Click to Delete" style="text-decoration:none">Delete</a>';
			$edit = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./edit_payment_details.php?id='.$row1->id.'","670","500","edit_payment_details") title="Click to Edit Invoice" style="text-decoration:none">Edit</a>';
			$action = '<div class="input-group-btn">
							<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
							</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li>'.$edit.'</li>
									<li>'.$delete.'</li>                                               
								</ul>
							</div>';  
			?>
				<tr>
					<th id="count<?php echo $cnt;?>"><?php echo $cnt;?></th>
					<th id="id<?php echo $cnt;?>"><?php echo $row1->id;?></th>
					<td nowrap="nowrap"><?php echo date("d-m-Y",strtotime($row1->repayment_date));?></td>	
					<td style="text-align: right;" nowrap="nowrap"><?php echo number_format($row1->amount,2);?></td>
					<td style="text-align: right;"  nowrap="nowrap"><input type="text" id="amount_paid<?php echo $cnt;?>" name="amountpaid" value="<?php echo number_format($row1->amount_paid, 2);?>"></td>
					<td style="text-align: center;"  nowrap="nowrap">
						<input type="text" name="datepaid" id="datepaid<?php echo $cnt;?>" value="<?php echo date("m/d/Y",strtotime($datepaid));?>" readonly>
					</td>
					<td style="text-align: center;" nowrap="nowrap">
						<button class='btn btn-info button_update' id='<?php echo $cnt;?>' >Update</button>
					</td>
					<td style="text-align: center;" nowrap="nowrap"><?php echo $action;?>
					</td>
					

					
				</tr>

			<?php $cnt=$cnt+1;
			//$gtotal+=$subtotal;
		$total_amounts += $row1->amount;
		$total_payments += $row1->amount_paid;
		}
		?>
		  <button class='btn btn-info' id='button_add' >Add New</button>

		<?php
		
	} 
	?>

<tr>
<th colspan="3" style="text-align:center">Totals</th>
<th style="text-align: right;"><?php echo number_format($total_amounts,2);?></th>
<th style="text-align: right;"><?php echo number_format($total_payments,2);?></th>	
<th>&nbsp;</th>
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
	
<script>
	$(document).ready(function()
	{
	  $('.button_update').click(function()
	  {

 	 	var rowId=$(this).attr('id');
 	 	var idno=$("#id" + rowId).text();
 	 	var amount_paid = $("#amount_paid"+ rowId).val();
 	 	var datepaid = $("#datepaid"+ rowId).val();
 		var rowData = {
 			idno : idno,	
 			amount_paid: amount_paid,
 			datepaid: datepaid
 		};

  		// AJAX Request
		  $.ajax
		  ({
   			url: 'update_payments.php',
   			type: 'post',
   			data: rowData,
		   	success: function(response)
		   	{
   					//alert (response);
   					location.reload(true);

    			}
  			});

		 });

	});
	$(document).ready(function(){
  	$('#button_add').click(function(){

 	 	var invoice_id="<?php echo $invid; ?>";
 	 	var service_id="<?php echo $service_id; ?>";
 	 	
 		var rowData = {
 			invoice_id : invoice_id,	
 			service_id: service_id
 		};

  // AJAX Request
  $.ajax({
   url: 'add_payment_item.php',
   type: 'post',
   data: rowData,
   success: function(response){
   	alert (response);
   	location.reload(true);

    }
  });

 });

});

	$( function() {
    	$( ".datepick" ).datepicker();
  	});
</script>
</body>
</html>
<?php }  ?>