<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) {
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
} else{
    $logged_inuser = $_SESSION['member_id'];
    $op = $_REQUEST['op'];
    $eid=$_GET['editid'];
      if (isset($_POST['submit'])) {

        $member_id 			    =	$_POST['member_id'];
        $service_id 			=	$_POST['service_id'];
        $amount 				=	$_POST['amount'];
        $txn_id                 =   $_POST['txn_id'];
        $invoice_date 			=	date("Y-m-d", strtotime($_POST['contribution_date']));
        $cnt_id                 =   $_POST['cnt_id'];
        //$date_created 			=	date("Y-m-d H:i:s");
        //$created_by = $_SESSION['clientmsaid'];
            
            
        $sql=" UPDATE  member_contribution SET member_id=:member_id,payment_type=:service_id, contribution_amount=:amount, contribution_date=:invoice_date,txn_id=:txn_id WHERE id=:eid ";
        $query=$dbh->prepare($sql);
        $query->bindParam(':member_id',$member_id,PDO::PARAM_STR);
        $query->bindParam(':service_id',$service_id,PDO::PARAM_STR);
        $query->bindParam(':amount',$amount,PDO::PARAM_STR);
        
        
        $query->bindParam(':invoice_date',$invoice_date,PDO::PARAM_STR);
        $query->bindParam(':txn_id',$txn_id,PDO::PARAM_STR);
        $query->bindParam(':eid', $cnt_id, PDO::PARAM_STR);

        $query->execute();

        
              //$LastInsertId=$dbh->lastInsertId();
              $count = $query->rowCount();
              if ($count>0) {
                $audit_description = "Updated Member Contribution for (".get_membername_fromid($dbh,$member_id).") ID: ".$cnt_id;
                 audit_trail($dbh, $audit_description, $logged_inuser);
                 // echo '<script>alert("Client has been added.")</script>';
                  echo "<script>window.location.href ='edit_contribution_details.php?editid=$cnt_id&op=ok'</script>";
              } else {
                 
                  echo "<script>window.location.href ='edit_contribution_details.php?editid=$cnt_id&op=no'</script>";
              }
         // }

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

    <title>Badili Sacco | update Member Contribution Details</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>


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
            $txn_id = $rw->txn_id;

            $date_created = $rw->date_created;
            $created_by = $rw->created_by;
        }
    } 
?>



<body class="nav-md">
<div class="container body">
        <div class="main_container">
            
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <form method="post" novalidate enctype="multipart/form-data">
                                        
                                        <?php 
                                        if ($op=="ok") {
                                            ?>
                                            <div class="alert alert-success" role="alert">
                                                Contribution Details Updated Successfully.
                                            </div>
                                        <?php
                                        }elseif ($op == "no") {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Update failed or no changes made! try again!.
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <span class="section">Update Member Contribution</span>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Contribution Date:<span class="required">*</span></label>
												<div class="col-md-6 col-sm-6">
													<input class="form-control datepick" name="contribution_date" id="contribution_date" onChange="changeRepaymentstart(this.value)" value="<?php echo date('d-m-Y', strtotime($contribution_date));?>" required="required" />
												</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Member:<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<select name="member_id" id="member_id" placeholder="Select Client ..." class="form-control " required='true'>
													<option value=""></option>
													<?php
														$staus = "1";
														$sqclients="SELECT member_id from users where status=:staus";
														$query_clients = $dbh -> prepare($sqclients);
														$query_clients->bindParam(':staus',$staus,PDO::PARAM_STR);
														$query_clients->execute();
														$result_clients=$query_clients->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query_clients->rowCount() > 0)
														{
															foreach($result_clients as $row_clients)
															{  
																$mbrid = $row_clients->member_id;
																?>
																	<option value="<?php  echo $row_clients->member_id;?>" <?php if($member_id==$row_clients->member_id) echo "selected";?>><?php  echo get_membername_fromid($dbh, $mbrid);?></option>
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
																<option value="<?php  echo $row_services->id;?>" <?php if($payment_type==$row_services->id) echo "selected";?>><?php  echo $row_services->description;?></option>
															
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
												<input class="form-control" type="number" class='number' name="amount" required='required' value="<?php echo ($contribution_amount);?>"></div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Transaction No.<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="txn_id" id="txn_id" value="<?php echo $txn_id;?>" placeholder="Transaction ID" required />
                                            </div>
                                        </div>
                                        <input type="hidden" name="cnt_id" id="cnt_id" value="<?php echo $eid;?>" />
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary" >Update</button>
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
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
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

    <script type="text/javascript">
        function ValidatePassword() {
            var mem_no = document.getElementById("mem_no").value;
            if (mem_no=="") {
                alert("Fill in the Member Number.");
                return false;
            }
            var fname = document.getElementById("fname").value;
            if (fname=="") {
                alert("Fill in the Member First Name.");
                return false;
            }
            var lname = document.getElementById("lname").value;
            if (lname=="") {
                alert("Fill in the Member Last Name.");
                return false;
            }
            var national_id = document.getElementById("national_id").value;
            if (national_id=="") {
                alert("Fill in the Member ID / Passport No.");
                return false;
            }
            var phnumber = document.getElementById("phnumber").value;
            if (phnumber=="") {
                alert("Fill in the Member Phone No.");
                return false;
            }
            var user_department = document.getElementById("user_department").value;
            if (user_department=="") {
                alert("Select user Department.");
                return false;
            }
            
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("cpassword").value;
            if (password != confirmPassword || password=="" ) {
                alert("Passwords do not match.");
                return false;
            }
            var email = document.getElementById("email").value;            
            if ( (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) != true || email=="" )
            {
                alert("You have entered an invalid email address!");
                return (false);
            }
            return true;
        }
    </script>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>
<?php
}
 ?>
