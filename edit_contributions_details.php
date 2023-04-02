<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
	if(isset($_POST['submit']))
	{
		$eid=$_REQUEST['editid'];
		$member_id 				=	$_POST['member_id'];
		$amount 				=	$_POST['contribution_amount'];
		$service_id 			=	$_POST['service_id'];
		$invoice_date = date('Y-m-d', strtotime($_POST['contribution_date']));

		$sql="UPDATE member_contribution SET member_id=:member_id,contribution_amount=:amount,contribution_date=:invoice_date,payment_type=:service_id WHERE id=:eid";
		$query=$dbh->prepare($sql);
		$query->bindParam(':member_id',$member_id,PDO::PARAM_STR);
		$query->bindParam(':amount',$amount,PDO::PARAM_STR);
		$query->bindParam(':invoice_date',$invoice_date,PDO::PARAM_STR);
		$query->bindParam(':eid',$eid,PDO::PARAM_STR);
		$query->bindParam(':service_id',$service_id,PDO::PARAM_STR);
		$query->execute();
		echo '<script>alert("Invoice has been updated added.")</script>';
		echo "<script>window.location.href ='edit_contributions_details.php?editid=$eid'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Santalink | Update Invoice</title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	 <link href="./vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="./vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

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
									<form method="post"> 
										<?php
										$eid=$_GET['editid'];
										$sql="SELECT * from member_contribution where id=:eid";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':eid',$eid,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $rw)
											{               
												$contribution_amount = $rw->contribution_amount;
												$contribution_date =  $rw->contribution_date;
												$member_id = $rw->member_id; 
												$payment_type = $rw->payment_type;
											}
										} ?>

										<span class="section">Update Member Contributions</span>			
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Contribution Date:<span class="required">*</span></label>
												<div class="col-md-6 col-sm-6">
													<input class="form-control datepick" name="contribution_date" value="<?php echo date('d-m-Y', strtotime($contribution_date));?>" required="required" />
												</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Member:<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<select name="member_id" id="member_id" placeholder="Select Client ..." class="form-control member_id" required='true'>
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
															{  ?>
																<option value="<?php  echo $row_clients->ID;?>"<?php if($member_id==$row_clients->ID) echo "selected";?>><?php  echo $row_clients->ContactName;?></option>
															
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
																	<option value="<?php  echo $row_services->id;?>"<?php if($row_services->id==$payment_type) echo "selected";?>><?php  echo $row_services->description;?></option>	
																<?php 
																$cnt=$cnt+1;
															}
														} 
													?>
												</select>   
											</div>
										</div>									
										
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Contributions Amount: <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="number" class='number' name="contribution_amount" required='required' value="<?php  echo $contribution_amount?>"></div>
										</div>
										
										<input type="hidden" name="editid" value="<?php echo $eid;?>">
		
		
										<div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary">Update</button>
                                                    <button type='button' onclick="window.open('', '_self', ''); window.close();" class="btn btn-success">Cancel</button>
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
	<!-- bootstrap-daterangepicker -->
    <script src="./vendors/moment/min/moment.min.js"></script>
    <script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-daterangepicker -->
    <link href="./vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- bootstrap-datetimepicker -->    
    <script src="./vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>

	<!-- Initialize datetimepicker -->
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
