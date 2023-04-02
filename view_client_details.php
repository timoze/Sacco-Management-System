<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	$com_nam = $company_name;
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | Client Details </title>
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


				$sql_client="SELECT * from  tblclient WHERE ID=:client_id";
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
					$gphnumber = $rowclient->Guarantorphnumber;
					$GuarantorID = $rowclient->GuarantorID;
					//$guarantor = $rowclient->guarantor;
					$path = $rowclient->path;
					$collateral = $rowclient->Notes;
				}

			?>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="x_panel">
						<div class="x_content">
							<span class="section">Client Details <?php print $com_nam;?></span>
							<table class="table table-bordered" width="100%" border="1"> 
								<tr>
									<th colspan="3" style="text-align: center;">Client Details</th>	
								</tr>

								<tr> 
									
									<th>Client Name</th> 
									<td><?php  echo htmlentities($client_name);?></td>
									<td rowspan="5"><img src="<?php echo $path;?>" width="250px" height="230px"></td>
								</tr>
								<tr> 
									
									<th>Client Business</th> 
									<td><?php  echo htmlentities($company_name);?></td>
								</tr>
								<tr>
									<th>ID / Passport No.</th> 
									<td><?php  echo htmlentities($nationalid);?></td>
								</tr> 
								<tr>
								
									<th>Phone Number</th> 
									<td><?php echo  htmlentities($phnumber);?></td> 
								</tr> 
								<tr> 
									<th>Family</th> 
									<td><?php echo htmlentities($family);?></td>
								</tr> 
								<tr>
									<th>Collateral</th> 
									<td colspan="2"><?php echo  htmlentities($collateral);?></td> 
									
								</tr> 
								<tr>
									<th colspan="3" style="text-align: center;">Guarantor Details</th>	
								</tr>
								<tr>
									<th>Guarantor</th> 
									<td colspan="2"><?php echo  htmlentities($guarantor);?></td> 
									
								</tr>
								<tr>								
									<th>Guarantor ID/Passport</th> 
									<td colspan="2"><?php  echo htmlentities($GuarantorID);?></td>
								</tr>
								<tr>								
									<th>Guarantor Contact</th> 
									<td colspan="2"><?php  echo htmlentities($gphnumber);?></td>
								</tr> 
								<tr>
									<th colspan="3" style="text-align: center;">Signatures</th>	
								</tr>
								<tr>
									<th>Cient Signature</th> 
									<td colspan="2"></td> 
									
								</tr>
								<tr>								
									<th>Guarantor Signature</th> 
									<td colspan="2"></td>
								</tr>
								<tr>								
									<th>Company Signature</th> 
									<td colspan="2"></td>
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