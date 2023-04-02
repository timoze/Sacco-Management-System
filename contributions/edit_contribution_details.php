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
        $member_id 			    =	$_POST['member_id'];
        $txn_id                 =   $_POST['txn_id'];
        $invoice_date 			=	date("Y-m-d", strtotime($_POST['contribution_date']));
        $member_id 			    =	$_POST['member_id'];
        $txn_id                 =   $_POST['txn_id'];
        $total_amount           =   $_POST['total_amount'];
        //NEW ITEMS FOR INSERT
        $service_id_array 		=	$_POST['service_id'];
        $amount_array 			=	$_POST['amount'];
        $val_date_array         =   $_POST['val_date'];

        //ITEMS FOR UPDATE
        $item_id_array            = $_POST['item_id'];
        $service_id_edit_array    = $_POST['service_id_edit'];
        $amount_edit_array        = $_POST['amount_edit'];
        $val_date_edit_array    = $_POST['val_date_edit'];
        $cnt_id                 =   $_POST['cnt_id'];
        $loan_id = 0;
        if (isset($_POST['loan_id'])) {
            $loan_id                =   $_POST['loan_id'];
        }
        $cr_dr = 'D';
        $date_created 			=	date("Y-m-d H:i:s");
        //UPDATE MAIN DETAILS
        $count = 0;
        $sql=" UPDATE  member_contribution_main SET member_id=:member_id, contribution_amount=:amount, contribution_date=:invoice_date,txn_id=:txn_id WHERE id=:eid ";
        $query=$dbh->prepare($sql);
        $query->bindParam(':member_id', $member_id, PDO::PARAM_STR);
        $query->bindParam(':amount', $total_amount, PDO::PARAM_STR);
        $query->bindParam(':invoice_date', $invoice_date, PDO::PARAM_STR);
        $query->bindParam(':txn_id', $txn_id, PDO::PARAM_STR);
        $query->bindParam(':eid', $cnt_id, PDO::PARAM_STR);
        $query->execute();
        $count += $query->rowCount();

        //EDIT INITIAL ITEMS
        if (count($item_id_array) > 0) {
            foreach ($item_id_array as $itemkey => $item_id) {
                $service_id_edit    =   $service_id_edit_array[$itemkey];
                $amount_edit        =   $amount_edit_array[$itemkey];
                $val_date_edit      =  date("Y-m-d", strtotime($val_date_edit_array[$itemkey]));

                //IF LOAN REPAYMENT COMPUTE THE INTEREST AMOUNT PAID
                if ($service_id_edit == '5') {
                    //loan details from loan id
                    $loan_id            =   $_POST['loan_id'];
                    $loan_amount_query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT contribution_amount from member_contribution where loan_id='$loan_id' and status='1' and cr_dr='C' "));
                    $loan_initial_amount = $loan_amount_query['contribution_amount'];
                    //get repayment period
                    $loan_repayperiod_query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT repayment_period from loan_application where appl_id='$loan_id' and status='1'  "));
                    $repayment_period = $loan_repayperiod_query['repayment_period'];
                    //get paid interest amounts
                    $total_interest_paid = 0;
                    $total_loan_repaid = 0;
                    $balance_oninitial = 0;
                    $interest_query = mysqli_query($connection, "SELECT contribution_amount, loan_interest from member_contribution where loan_id='$loan_id' and status='1' and cr_dr='D' ");
                    while ($rw_results = mysqli_fetch_assoc($interest_query)) {
                        $loan_interest_paid = $rw_results['loan_interest'];
                        $loan_repaid_amount = $rw_results['contribution_amount'];
                        $total_interest_paid += $loan_interest_paid;
                        $total_loan_repaid += $loan_repaid_amount;
                        $balance_oninitial += ($loan_repaid_amount - $loan_interest_paid);
                    }
                    //GET THE CURRENT OUTSTANDING BALANCE ON THE PRINCIPAL AMAOUNT
                    $loan_outstanding_principal = $loan_initial_amount - $balance_oninitial;
                    $interestRate = INTEREST_RATE;
                    //GET THE LOAN INTEREST AMOUNT
                    //$loan_interest = calculateInterest($amount, $interestRate, $loan_outstanding_principal, $repayment_period);
                    $loan_interestedit = calculateInterest($loan_outstanding_principal, $interestRate, $amount_edit);
                    
                }else{
                    $loan_interestedit = 0;
                    $loan_id = 0;
                }


                $sql1=" UPDATE  member_contribution SET member_id=:member_id, contribution_amount=:amount, contribution_date=:invoice_date, payment_type=:service_id,txn_id=:txn_id,loan_id=:loan_id,loan_interest=:loan_interest WHERE id=:eid and contrib_id=:contrib_id ";
                $query1=$dbh->prepare($sql1);
                $query1->bindParam(':member_id', $member_id, PDO::PARAM_STR);
                $query1->bindParam(':service_id', $service_id_edit, PDO::PARAM_STR);
                $query1->bindParam(':amount', $amount_edit, PDO::PARAM_STR);
                $query1->bindParam(':invoice_date', $val_date_edit, PDO::PARAM_STR);
                $query1->bindParam(':txn_id', $txn_id, PDO::PARAM_STR);
                $query1->bindParam(':loan_id', $loan_id, PDO::PARAM_STR);
                $query1->bindParam(':contrib_id', $cnt_id, PDO::PARAM_STR);
                $query1->bindParam(':eid', $item_id, PDO::PARAM_STR);
                $query1->bindParam(':loan_interest',$loan_interestedit, PDO::PARAM_STR);
                $query1->execute();
                $count += $query1->rowCount();
                if ($service_id_edit == '5') {
                    $val_return = update_loan_schedule($loan_id, $val_date_edit);
                }
            }
        }   

        //INSERT NEW ITEMS
        if (count($service_id_array) > 0) {
            foreach ($service_id_array as $key => $service_id) {
                $amount     =   $amount_array[$key];
                $val_date   =  date("Y-m-d",strtotime($val_date_array[$key]));

                 //IF LOAN REPAYMENT COMPUTE THE INTEREST AMOUNT PAID
                 if ($service_id == '5') {
                    $loan_id        =   $_POST['loan_id'];
                    //loan details from loan id
                    $loan_amount_query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT contribution_amount from member_contribution where loan_id='$loan_id' and status='1' and cr_dr='C' "));
                    $loan_initial_amount = $loan_amount_query['contribution_amount'];
                    //get repayment period
                    $loan_repayperiod_query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT repayment_period from loan_application where appl_id='$loan_id' and status='1'  "));
                    $repayment_period = $loan_repayperiod_query['repayment_period'];
                    //get paid interest amounts
                    $total_interest_paid = 0;
                    $total_loan_repaid = 0;
                    $balance_oninitial = 0;
                    $interest_query = mysqli_query($connection, "SELECT contribution_amount, loan_interest from member_contribution where loan_id='$loan_id' and status='1' and cr_dr='D' ");
                    while ($rw_results = mysqli_fetch_assoc($interest_query)) {
                        $loan_interest_paid = $rw_results['loan_interest'];
                        $loan_repaid_amount = $rw_results['contribution_amount'];
                        $total_interest_paid += $loan_interest_paid;
                        $total_loan_repaid += $loan_repaid_amount;
                        $balance_oninitial += ($loan_repaid_amount - $loan_interest_paid);
                    }
                    //GET THE CURRENT OUTSTANDING BALANCE ON THE PRINCIPAL AMAOUNT
                    $loan_outstanding_principal = $loan_initial_amount - $balance_oninitial;
                    $interestRate = INTEREST_RATE;
                    //GET THE LOAN INTEREST AMOUNT
                    //$loan_interest = calculateInterest($amount, $interestRate, $loan_outstanding_principal, $repayment_period);
                    $loan_interest = calculateInterest($loan_outstanding_principal, $interestRate, $amount);
                    
                }else{
                    $loan_interest = 0;
                    $loan_id = 0;
                }
                //$created_by = $_SESSION['clientmsaid'];
                $sql2="INSERT into member_contribution(member_id,payment_type, cr_dr, contribution_amount, date_created, contribution_date,created_by, txn_id, loan_id,contrib_id,loan_interest) values(:member_id,:service_id, :cr_dr, :amount,:date_created, :invoice_date,:created_by,:txn_id,:loan_id,:contrib_id,:loan_interest)";
                $query2=$dbh->prepare($sql2);
                $query2->bindParam(':member_id', $member_id, PDO::PARAM_STR);
                $query2->bindParam(':service_id', $service_id, PDO::PARAM_STR);
                $query2->bindParam(':amount', $amount, PDO::PARAM_STR);
                $query2->bindParam(':date_created', $date_created, PDO::PARAM_STR);
                $query2->bindParam(':created_by', $logged_inuser, PDO::PARAM_STR);
                $query2->bindParam(':invoice_date', $val_date, PDO::PARAM_STR);
                $query2->bindParam(':txn_id', $txn_id, PDO::PARAM_STR);
                $query2->bindParam(':loan_id', $loan_id, PDO::PARAM_STR);
                $query2->bindParam(':cr_dr', $cr_dr, PDO::PARAM_STR);
                $query2->bindParam(':contrib_id', $cnt_id, PDO::PARAM_STR);
                $query2->bindParam(':loan_interest',$loan_interest, PDO::PARAM_STR);
                $query2->execute();
                $count += $query2->rowCount();

                if ($service_id == '5') {
                    $val_return = update_loan_schedule($loan_id, $val_date);
                }

                $icount++;
            }
        }   
        //$count = $query->rowCount();
        if ($count>0) {
            $audit_description = "Updated Member Contribution for (".get_membername_fromid($dbh, $member_id).") ID: ".$cnt_id;
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

    <link rel="stylesheet" href="../vendor/chosen/docsupport/style.css">
    <link rel="stylesheet" href="../vendor/chosen/docsupport/prism.css">
    <link rel="stylesheet" href="../vendor/chosen/chosen.css">

    <link href="../vendor/jquery_date_picker/css/jquery-ui.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<?php
    $eid=$_GET['editid'];
    $sql="SELECT * from member_contribution_main where id=:eid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if ($query->rowCount() > 0) {
        foreach ($results as $rw) {
            $contribution_amount = $rw->contribution_amount;
            $contribution_date =  $rw->contribution_date;
            $member_id = $rw->member_id;
            
            $txn_id = $rw->txn_id;
            
            $date_created = $rw->date_created;
            $created_by = $rw->created_by;

            $contrib_amt_query    =   mysqli_query($connection, "SELECT id,contribution_amount,payment_type,contribution_date,loan_id from member_contribution where contrib_id='$eid' and status='1' ");
            $cntrn_items_array = array();
            $loan_id_array = array();
            $payment_type_array = array();
            while ($row = mysqli_fetch_assoc($contrib_amt_query)) {
                $contrbtn_val_id = $row['id'];
                $contrbtn_contribution_amount = $row['contribution_amount'];
                $contrbtn_payment_type = $row['payment_type'];
                $valdate = $row['contribution_date'];
                $loan_id_array[] = $row['loan_id'];
                $payment_type_array[] = $contrbtn_payment_type;
                $cntrn_items_array[] = array($contrbtn_val_id, $contrbtn_payment_type, $contrbtn_contribution_amount,$valdate);
            }
        }
    }
    $loan_id = max($loan_id_array);
    ?>
<body onload="loadmember_pending_loans(<?php echo $member_id; ?>,<?php echo $payment_type_array; ?>,<?php echo $loan_id; ?>);updateTotal();">
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
                                                Contribution Details Updated Successfully.
                                            </div>
                                        <?php
                                            } elseif ($op == "no") {
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
												<div class="col-md-9 col-sm-9">
													<input class="form-control datepick" name="contribution_date" id="contribution_date" onChange="changeRepaymentstart(this.value)" value="<?php echo date('d-m-Y', strtotime($contribution_date));?>" required="required" />
												</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Member:<span class="required">*</span></label>
											<div class="col-md-9 col-sm-9">
												<select name="member_id" id="member_id" placeholder="Select Client ..." onchange="loadmember_pending_loans(this.value,'',<?php echo $loan_id; ?>)" class="form-control " required='true'>
													<option value=""></option>
													<?php
                                                        $staus = "1";
                                                        $sqclients="SELECT member_id from users where status=:staus";
                                                        $query_clients = $dbh -> prepare($sqclients);
                                                        $query_clients->bindParam(':staus', $staus, PDO::PARAM_STR);
                                                        $query_clients->execute();
                                                        $result_clients=$query_clients->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt=1;
                                                        if ($query_clients->rowCount() > 0) {
                                                            foreach ($result_clients as $row_clients) {
                                                                $mbrid = $row_clients->member_id;
                                                                ?>
                                                        <option value="<?php  echo $row_clients->member_id;?>" <?php if ($member_id==$row_clients->member_id) {
                                                            echo "selected";
                                                        }?>><?php  echo get_membername_fromid($dbh, $mbrid);?></option>
                                                    <?php
                                                    $cnt=$cnt+1;
                                                    }
                                                }
                                                ?>
												</select>  
											</div>
										</div>
										
                                        
										
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Transaction No.<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <input class="form-control" name="txn_id" id="txn_id" value="<?php echo $txn_id;?>" placeholder="Transaction ID" required />
                                            </div>
                                        </div>
                                        


                                        <div class="field item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <section><b>Being Payment For:</b></section>
                                                <table id="particulars" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%"></b>Val Date</b></th>
                                                            <th width="50%"></b>Item</b></th>
                                                            <th width="20%"></b>Amount</b></th>
                                                            <th width="10%"></b></b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    $total_amount_val = 0;
                                                    for ($icount=0; $icount < count($cntrn_items_array) ; $icount++) {
                                                        $item_id        =   $cntrn_items_array[$icount][0];
                                                        $pay_type_id    =   $cntrn_items_array[$icount][1];
                                                        $item_amount    =   $cntrn_items_array[$icount][2];
                                                        $item_val_date    =   $cntrn_items_array[$icount][3];
                                                        $total_amount_val += $item_amount;


                                                        ?>
                                                    <tr id="tr_id<?php echo $icount;?>">
                                                        <td width="20%"><input class="form-control valdateclass" type="text" name="val_date_edit[]" id="val_date_edit<?php echo $icount;?>" required='required' value="<?php echo date("d-m-Y",strtotime($item_val_date));?>" onblur="load_date_selector()"></td>
                                                        
                                                        <td width="50%">

                                                        <select name="service_id_edit[]" id="service_id_edit<?php echo $icount;?>" placeholder="Select Service Category ..." onchange="loadmember_pending_loans(member_id.value,this.value)" class="form-control service_id" required='true'>	
                                                            <option value=""></option>
                                                            <?php
                                                                $staus = "1";
                                                                $sql_services="SELECT description, id from payment_items where status=:staus";
                                                                $query_services = $dbh -> prepare($sql_services);
                                                                $query_services->bindParam(':staus', $staus, PDO::PARAM_STR);
                                                                $query_services->execute();
                                                                $result_services=$query_services->fetchAll(PDO::FETCH_OBJ);
                                                                $cnt=1;
                                                                if ($query_services->rowCount() > 0) {
                                                                    foreach ($result_services as $row_services) {  ?>
                                                                        <option value="<?php  echo $row_services->id;?>" <?php if ($pay_type_id==$row_services->id) {
																    echo "selected";
																}?> ><?php  echo $row_services->description;?></option>
                                                                        <?php
                                                                        $cnt=$cnt+1;
                                                                    }
                                                                }
                                                                ?>
                                                        </select>   
                                                            
                                                        </td >
                                                        <td width="20%" ><input class="form-control number amountclass" type="number" name="amount_edit[]" id="amount_edit<?php echo $icount;?>" onblur="updateTotal()" required='required' value="<?php echo $item_amount;?>"></td>
                                                        <td width="10%" style="text-align: center;">

                                                        

                                                            <button type="button" id="<?php echo $icount;?>" class="btn btn-danger deleteSavedItems">X</button>
                                                        </td>
                                                        
                                                        <input type="hidden" name="item_id[]" id="item_id<?php echo $icount;?>" value="<?php echo $item_id;?>" />
                                                        <input type="hidden" name="item_amount_id" id="item_amount_id<?php echo $icount;?>" value="<?php echo $item_amount;?>" />
                                                        <input type="hidden" name="selected_pay_item" id="selected_pay_item<?php echo $icount;?>" value="<?php echo $pay_type_id;?>" />
                                                    </tr>

                                                    <?php }?>

                                                    <input type="hidden" name="total_amount_initial" id="total_amount_initial" value="<?php echo $total_amount_val;?>" />


                                                    </tbody>
                                                    
                                                        <tr>
                                                            <th width="20%"><b>&nbsp;</b></th>
                                                            <th width="50%"><b>Total:</b></th>
                                                            <th width="20%"><b><input class="form-control" type="number" class='number' name="total_amount" id="total" value="<?php echo $total_amount_val;?>" readonly></b></th>
                                                            <td width="10%" style="text-align: center;">&nbsp;</td>
                                                            
                                                        </tr>

                                                    
                                                   
                                                </table>
                                                <a href="#" id="addRow" ><button type="button" class="btn btn-success">+</button></a> <a href="#" id="deleteRow" ><button type="button" class="btn btn-danger">-</button></a>
                                            </div>
                                        </div>

                                        <span id="pendingloans"></span>





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
            
            
           
            var txn_id = document.getElementById("txn_id").value;
            if (txn_id=="") {
                alert("Fill in the Transaction ID");
                return false;
            }

            var inputs = document.getElementsByClassName("amountclass");
            for (var i = 0; i < inputs.length; i++) {
                if (isNaN(inputs[i].value) || inputs[i].value.length == 0 || inputs[i].value=="") {
                    alert("Fill in the Amount Paid");
                    return false;
                }
            }

            var inputs_service = document.getElementsByClassName("service_id");
            for (var i = 0; i < inputs_service.length; i++) {
                if (inputs_service[i].value == "") {
                    alert("Select Payment Item.");
                    return false;
                }
                if(inputs_service[i].value == '5'){
                    var loan_id = document.getElementById("loan_id").value;
                    if (loan_id=="") {
                        alert("Select Loan to Pay!");
                        return false;
                    }
                }
                
            }
            
            return true;
        }
        function loadmember_pending_loans(member_id,paytype,loan_id) {
            const pay_items_array = [];
            var inputs_service = document.getElementsByClassName("service_id");
            for (var i = 0; i < inputs_service.length; i++) {
                pay_items_array[i] = inputs_service[i].value;
            }
            var rowData = {
                    member_id : member_id,
                    payment_item : pay_items_array,
                    loan_id : loan_id
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
        });
        


        $(document).ready(function() {
            var counter = 0;
        $("#addRow").click(function() {
            
            var row = $("<tr>", { id: "tbl_row"+counter , class: "tbl_row"});
            row.appendTo("#particulars");

            var cell3 = $("<td>",{width: "20%" });
            var input2 = $("<input>", { name: "val_date[]",  class:"form-control  valdateclass", type:"text" ,  id:"val_date"+counter, value : "<?php echo date('d-m-Y'); ?>"   });
            input2.appendTo(cell3);
            cell3.appendTo(row);

            var cell = $("<td>",{width: "50%" });
            var select = $("<select>", { name: "service_id[]", class: "form-control service_id", id: "service_id"+counter });
            select.appendTo(cell);
            cell.appendTo(row);
           
            

            var cell2 = $("<td>",{width: "20%" });
            var input1 = $("<input>", { name: "amount[]",  class:"form-control number amountclass", type:"number" ,  id:"amount"+counter   });
            input1.appendTo(cell2);
            input1.on("blur",function() {
                var total = 0;
                var inputElements = document.getElementsByClassName("amountclass");
                Array.prototype.forEach.call(inputElements, function(input) {
                    var value = input.value;
                    if (!isNaN(value) && value.length != 0) {
                        total += parseFloat(value);
                    }
                });
                $("#total").val(total);
            });
            cell2.appendTo(row);

            var cell4 = $("<td>",{width: "10%" });
            cell4.appendTo(row);
            //retrieving options
            $.ajax({
                type: 'GET',
                url: 'get_options.php',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (i, item) {
                        select.append($('<option>', { 
                            value: item.value,
                            text : item.text 
                        }));
                        
                    });
                    //load_chosen();
                }
            });
            select.on("change",function() {
                var mem_id = $("#member_id").val();
                var pay_type = $(this).val();
                loadmember_pending_loans(mem_id,pay_type);
            });
            load_date_selector()
            
            counter++;
            
            
        });

       
        });

        $(document).ready(function() {

            $("#deleteRow").click(function() { 
                deleteRow();
            });
        
       
        });
        

        function updateTotal() {
            var total = 0;
            var inputs = document.getElementsByClassName("amountclass");
            for (var i = 0; i < inputs.length; i++) {
                if (!isNaN(inputs[i].value) && inputs[i].value.length != 0) {
                total += parseFloat(inputs[i].value);
                }
            }
            document.getElementById("total").value = total;
        }
        function deleteRow() {
            var inputs = document.getElementsByClassName("tbl_row");
            var totalrows = inputs.length;
            
            if (totalrows>0) {
                var lastval = totalrows-1;
                var lastEle = inputs[lastval];
                $("#"+lastEle.id).remove();
                exit;
            }else{
                alert('Not able to Delete');
                exit;
            }
        }

        function load_date_selector() {
            //var guarantors_cnt = document.getElementById("guarantors").value;
            var inputElements = document.getElementsByClassName("valdateclass");
                Array.prototype.forEach.call(inputElements, function(input) {
                    var elid = input.id;
                   // if(elid != 'val_date' )
                    {
                        //$("#"+elid).chosen();
                        $( "#"+elid ).datepicker({
                            dateFormat: 'dd-mm-yy'
                        });
                    }
                });
        }




        $(document).ready(function(){
            $('.deleteSavedItems').click(function(){

                var result = confirm("Are you sure to delete this record?");
                if (result) {
                    

                var rowId=$(this).attr('id');
                var contribution_id = $("#cnt_id").val();
                var item_id = $("#item_id"+rowId).val();
                var item_amount = $("#item_amount_id"+rowId).val();
                var selected_pay_item= $("#selected_pay_item"+rowId).val();
                var memberid = $("#member_id").val();
                var total_amount_initial = $("#total_amount_initial").val();
                //alert(item_id);
  
                var rowData = {
                    contribution_id : contribution_id,	
                    item_id: item_id,
                    item_amount: item_amount,
                    selected_pay_item: selected_pay_item,
                    memberid:memberid,
                    rowId: rowId,
                    total_amount_initial:total_amount_initial
                };

                // AJAX Request
                $.ajax({
                url: 'delete_pay_item.php',
                type: 'post',
                data: rowData,
                success: function(response){
                       // alert (response);
                        var table_rowid = "tr_id"+response.trim();
                        //$("table#particulars tr#tr_id"+response).remove();
                        //location.reload(true);
                        if (response.trim()!='') {
                            $("#"+table_rowid).remove();
                            updateTotal();
                        }else{
                            location.reload(true);
                        }
                        

                    }
                });
            }
            });
        
       
        });
    </script>
</body>
</html>
<?php
}
 ?>
