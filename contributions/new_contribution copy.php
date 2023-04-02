<?php
ob_start();
session_start();
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require '../vendor/autoload.php';
//error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) {
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
} else{
    $logged_inuser = $_SESSION['member_id'];
    $op = $_REQUEST['op'];
    $err_msg = $_REQUEST['err_msg'];
if (isset($_POST['submit'])) {
    //$clientmsaid=$_SESSION['clientmsaid'];
    $member_id 			    =	$_POST['member_id'];
    $service_id 			=	$_POST['service_id'];
    $amount 				=	$_POST['amount'];
    $txn_id                 =   $_POST['txn_id'];
    
    $invoice_date 			=	date("Y-m-d", strtotime($_POST['contribution_date']));
    $date_created 			=	date("Y-m-d H:i:s");
    $loan_id = 0;
    if(isset($_POST['loan_id'])){
        $loan_id            =   $_POST['loan_id'];
    }
    
    
    //$created_by = $_SESSION['clientmsaid'];
    $cr_dr = "D";
   $sql="INSERT into member_contribution(member_id,payment_type, cr_dr, contribution_amount, date_created, contribution_date,created_by, txn_id, loan_id) values(:member_id,:service_id, :cr_dr, :amount,:date_created, :invoice_date,:created_by,:txn_id,:loan_id)";
   $query=$dbh->prepare($sql);
   $query->bindParam(':member_id',$member_id,PDO::PARAM_STR);
   $query->bindParam(':service_id',$service_id,PDO::PARAM_STR);
   $query->bindParam(':amount',$amount,PDO::PARAM_STR);
   $query->bindParam(':date_created',$date_created,PDO::PARAM_STR);
   $query->bindParam(':created_by',$logged_inuser,PDO::PARAM_STR);
   $query->bindParam(':invoice_date',$invoice_date,PDO::PARAM_STR);
   $query->bindParam(':txn_id',$txn_id,PDO::PARAM_STR);
   $query->bindParam(':loan_id',$loan_id,PDO::PARAM_STR);
   $query->bindParam(':cr_dr',$cr_dr,PDO::PARAM_STR);
   $query->execute();
    $LastInsertId=$dbh->lastInsertId();
    if ($LastInsertId>0) {
        // echo '<script>alert("Client has been added.")</script>';
        $audit_description = "Registered new member contribution (" . get_membername_fromid($dbh,$member_id) .")";
        audit_trail($dbh, $audit_description, $logged_inuser);

        echo "<script>window.location.href ='new_contribution.php?op=ok'</script>";
    } else {
        echo "<script>window.location.href ='new_contribution.php?op=no'</script>";
    }
    // }
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Badili Sacco | New Contribution</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <link rel="stylesheet" href="../vendor/chosen/docsupport/style.css">
    <link rel="stylesheet" href="../vendor/chosen/docsupport/prism.css">
    <link rel="stylesheet" href="../vendor/chosen/chosen.css">

    <link href="../vendor/jquery_date_picker/css/jquery-ui.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form method="post"  onsubmit="return ValidateForm()" novalidate enctype="multipart/form-data">
                                        <span class="section">Member Contribution Form</span>
                                        <?php 
                                        if ($op=="ok") {
                                            ?>
                                            <div class="alert alert-success" role="alert">
                                                Details recorded Successfully.
                                            </div>
                                        <?php
                                        }elseif ($op == "no") {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Registration failed try again!.
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Contribution Date:<span class="required">*</span></label>
												<div class="col-md-9 col-sm-9">
													<input class="form-control datepick"  name="contribution_date" id="contribution_date" onChange="changeRepaymentstart(this.value)" value="<?php echo date('d-m-Y');?>" required="required" />
												</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Member:<span class="required">*</span></label>
											<div class="col-md-9 col-sm-9">
												<select name="member_id" id="member_id" onchange="loadmember_pending_loans(this.value,service_id.value)" placeholder="Select Client ..." class="form-control " required='true'>
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
																	<option value="<?php  echo $row_clients->member_id;?>"><?php  echo get_membername_fromid($dbh, $mbrid);?></option>
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
											<div class="col-md-9 col-sm-9">
												<select name="service_id" id="service_id" placeholder="Select Service Category ..." onchange="loadmember_pending_loans(member_id.value,this.value)" class="form-control service_id" required='true'>	
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
                                        <span id="pendingloans"></span>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Amount Paid: <span class="required">*</span></label>
											<div class="col-md-9 col-sm-9">
												<input class="form-control" type="number" class='number' name="amount" id="amount" required='required' value=""></div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Transaction No.<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <input class="form-control" name="txn_id" id="txn_id" placeholder="Transaction ID" required />
                                            </div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary" onclick="refreshmain_window()" >Submit</button>
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
        function ValidateForm() {
            var mem_no = document.getElementById("member_id").value;
            if (mem_no=="") {
                alert("Select Member.");
                return false;
            }
            var contribution_date = document.getElementById("contribution_date").value;
            if (contribution_date=="") {
                alert("Fill in the Contribution Date.");
                return false;
            }
            var service_id = document.getElementById("service_id").value;
            if (service_id=="") {
                alert("Select Payment Item.");
                return false;
            }
            if(service_id == 5){
                var loan_id = document.getElementById("loan_id").value;
                if (loan_id=="") {
                    alert("Select Loan to Pay!");
                    return false;
                }
            }
            var amount = document.getElementById("amount").value;
            if (amount=="") {
                alert("Fill in the Amount Paid");
                return false;
            }
            var txn_id = document.getElementById("txn_id").value;
            if (txn_id=="") {
                alert("Fill in the Transaction ID");
                return false;
            }
            
            return true;
        }
        function loadmember_pending_loans(member_id,payment_item) {
            var rowData = {
                    member_id : member_id,
                    payment_item : payment_item
                };
            $.ajax({
                type: "POST",
                url: "loadmember_pending_loans.php",
                data: rowData,
                success: function(data){
                    var y = document.getElementById("pendingloans");
                    y.innerHTML = data;
                }
            });
        }
        function refreshmain_window()
        {
            window.onunload = function()
            {
                window.opener.location.reload();
            };
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
    <script src="../vendor/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../vendor/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="../vendor/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="../vendor/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
    <script>
           $("#member_id").chosen();
        
           $("#service_id").chosen();
    </script>
    <script src="../vendor/jquery_date_picker/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#contribution_date" ).datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            });
        })
    </script>
</body>
</html>
<?php
  }
 ?>
