<?php
ob_start();
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
        $brief_description 		=	$_POST['brief_description'];
        $amount 				=	$_POST['amount'];
        $txn_id                 =   $_POST['txn_id'];
        $invoice_date 			=	date("Y-m-d", strtotime($_POST['expense_date']));
        $cnt_id                 =   $_POST['cnt_id'];
        
        //$date_created 			=	date("Y-m-d H:i:s");
        //$created_by = $_SESSION['clientmsaid'];
        $sql=" UPDATE  expenses SET brief_description=:brief_description, amount=:amount, expense_date=:invoice_date,txn_id=:txn_id WHERE expense_id=:eid ";
        $query=$dbh->prepare($sql);
    
        $query->bindParam(':brief_description',$brief_description,PDO::PARAM_STR);
        $query->bindParam(':amount',$amount,PDO::PARAM_STR);
        $query->bindParam(':invoice_date',$invoice_date,PDO::PARAM_STR);
        $query->bindParam(':txn_id',$txn_id,PDO::PARAM_STR);
  
        $query->bindParam(':eid', $cnt_id, PDO::PARAM_STR);
        $query->execute();
              //$LastInsertId=$dbh->lastInsertId();
              $count = $query->rowCount();
              if ($count>0) {
                $audit_description = "Updated Expense Details for (".$brief_description.") ID: ".$cnt_id;
                 audit_trail($dbh, $audit_description, $logged_inuser);
                 // echo '<script>alert("Client has been added.")</script>';
                  echo "<script>window.location.href ='edit_expense_details.php?editid=$cnt_id&op=ok'</script>";
              } else {
                  echo "<script>window.location.href ='edit_expense_details.php?editid=$cnt_id&op=no'</script>";
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
    <title>Badili Sacco | Update Expense Details</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../vendor/jquery_date_picker/css/jquery-ui.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<?php
    $eid=$_GET['editid'];
    $sql="SELECT * from expenses where expense_id=:eid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
        foreach($results as $rw)
        {               
            $amount = $rw->amount;
            $expense_date =  $rw->expense_date;
            $brief_description = $rw->brief_description; 
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
                                    <form method="post" onsubmit="return ValidateForm()" novalidate enctype="multipart/form-data">
                                        <?php 
                                        if ($op=="ok") {
                                            ?>
                                            <div class="alert alert-success" role="alert">
                                                Expense Details Updated Successfully.
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
                                        <span class="section">Update Expense Details</span>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Expense Date:<span class="required">*</span></label>
												<div class="col-md-9 col-sm-9">
													<input class="form-control datepick" name="expense_date" id="expense_date" onChange="changeRepaymentstart(this.value)" value="<?php echo date('d-m-Y', strtotime($expense_date));?>" required="required" />
												</div>
										</div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Brief Description<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <textarea name='brief_description' id="brief_description" placeholder="Brief Description  / Comments" rows="4" cols="6" ><?php echo $brief_description;?></textarea></div>
                                        </div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Expense Amount: <span class="required">*</span></label>
											<div class="col-md-9 col-sm-9">
												<input class="form-control" type="number" class='number' name="amount" id="amount" required='required' value="<?php echo ($amount);?>"></div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Transaction No.<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <input class="form-control" name="txn_id" id="txn_id" value="<?php echo $txn_id;?>" placeholder="Transaction ID" required />
                                            </div>
                                        </div>
                                        <input type="hidden" name="cnt_id" id="cnt_id" value="<?php echo $eid;?>" />
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary" onclick="refreshmain_window()" >Update</button>
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
            var expense_date = document.getElementById("expense_date").value;
            if (expense_date=="") {
                alert("Fill in the Contribution Date.");
                return false;
            }
            var brief_description = document.getElementById("brief_description").value;
            if (brief_description=="") {
                alert("Missing description ! ");
                return false;
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
    <script src="../vendor/jquery_date_picker/js/jquery.min.js"></script>
    <script src="../vendor/jquery_date_picker/js/jquery-ui.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#expense_date" ).datepicker({
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
