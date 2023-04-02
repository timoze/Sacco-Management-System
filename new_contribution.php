<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/functions.php');
$op = $_REQUEST['op'];
	if ($op=='ok') {
		$msg = "Member Contribution Added Successfully";
	}elseif ($op=='no') {
		$msg = "Something Went Wrong. Please try again";
	}

if (strlen($_SESSION['clientmsaid']==0)) {

	
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

 $client_id 			=	$_POST['client_id'];
 $service_id 			=	$_POST['service_id'];
 $amount 				=	$_POST['amount'];
 $invoice_date 			=	date("Y-m-d", strtotime($_POST['contribution_date']));

 $date_created 			=	date("Y-m-d H:i:s");
 $created_by = $_SESSION['clientmsaid'];
 
 
$sql="INSERT into member_contribution(member_id,payment_type, contribution_amount, date_created, contribution_date,created_by) values(:client_id,:service_id, :amount,:date_created, :invoice_date,:created_by)";
$query=$dbh->prepare($sql);
$query->bindParam(':client_id',$client_id,PDO::PARAM_STR);
$query->bindParam(':service_id',$service_id,PDO::PARAM_STR);
$query->bindParam(':amount',$amount,PDO::PARAM_STR);

$query->bindParam(':date_created',$date_created,PDO::PARAM_STR);
$query->bindParam(':created_by',$created_by,PDO::PARAM_STR);

$query->bindParam(':invoice_date',$invoice_date,PDO::PARAM_STR);

$query->execute();

$LastInsertId=$dbh->lastInsertId();

$invoice_id = $LastInsertId;

   	if ($LastInsertId>0) {

       echo "<script>window.location.href ='new_contribution.php?op=ok'</script>";
	   echo "<script type='text/javascript'>window.parent.location.reload()</script>";
   	}
  	else
    {
        
		echo "<script>window.location.href ='new_contribution.php?op=no'</script>";
    }

  
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Badili Group | New Contribution</title>

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
			<?php
			 	if ($op=='ok') {
					 ?>
					 	<div class="alert alert-success" role="alert">
							<?php print $msg;?>
						</div>
					 <?php
				 }elseif ($op=="no") {
					?>
						<div class="alert alert-danger" role="alert">
					   		<?php print $msg;?>
					   </div>
					<?php
				}
			
			?>
			
            
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <form method="post" novalidate>
                                        
                                        <span class="section">New Contribution</span>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Contribution Date:<span class="required">*</span></label>
												<div class="col-md-6 col-sm-6">
													<input class="form-control datepick" name="contribution_date" id="contribution_date" onChange="changeRepaymentstart(this.value)" value="<?php echo date('d-m-Y');?>" required="required" />
												</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Member:<span class="required">*</span></label>
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
																?>
																	<option value="<?php  echo $row_clients->ID;?>"><?php  echo $row_clients->ContactName;?></option>
																<?php 
																$cnt=$cnt+1;
															}
														} 
													?>
												</select>  
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Being Payment For:<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<select name="service_id" id="service_id" placeholder="Select Service Category ..." class="form-control service_id" required='true'>	
													<option value=""></option>
													<?php
														$staus = "1";
														$sql_services="SELECT description, id from payment_items where status=:staus";
														$query_services = $dbh -> prepare($sql_services);
														$query_services->bindParam(':staus',$staus,PDO::PARAM_STR);
														$query_services->execute();
														$result_services=$query_services->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query_services->rowCount() > 0)
														{
															foreach($result_services as $row_services)
															{  ?>
																<option value="<?php  echo $row_services->id;?>"><?php  echo $row_services->description;?></option>
															
																<?php 
																$cnt=$cnt+1;
															}
														} 
													?>
												</select>   
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Amount Paid: <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="number" class='number' name="amount" required='required' value=""></div>
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
		$( function() 
		{
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
