<?php
ob_start();
session_start();

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
   // $get_loan_id = $_REQUEST['editid'];
if (isset($_POST['submit'])) {
    $loan_id                =   $_POST['loan_e_id'];
    $appl_no                =   $_POST['loan_no'];
    $member_id 			    =	$_POST['member_id'];
    $guaranteed 			=	$_POST['guaranteed'];
    $guarantoramount        =   $_POST['guarantoramount'];
    $guarantors             =   $_POST['guarantors'];
    $guarantor              =   $_POST['guarantor'];
    $amount 				=	$_POST['amount'];
    $repayment_period       =   $_POST['repayment_period'];
    $application_date 		=	date("Y-m-d", strtotime($_POST['application_date']));
    $date_created 			=	date("Y-m-d H:i:s");
    $loan_rate              =   INTEREST_RATE;
    $monthly_emi            =   calcPayment($amount, $repayment_period, $loan_rate );
    $repayment_amount       =   round(($monthly_emi * $repayment_period),2);
    $emi                    =   round($monthly_emi, 2);
    if ($guaranteed != 1) {
            $guarantors = '0';
            $guaranteed = '0';
    }
    $max_amount = check_loan_max_borrow($dbh, $member_id, $guarantor);
    $member_limit = get_member_loanlimit($dbh, $member_id)*($guarantors+1);
    if ($guarantors!=0 && check_guarantor($dbh, $guarantor, $guarantoramount) || $guarantors==0) {
        if ($amount<=$max_amount && $amount<=$member_limit) {
            //$appl_no = $loan_no.'/'.date('Y');
            /*$sql="INSERT into loan_application(member_id,appl_no, application_date, loan_amount, repayment_amount ,installment_amount, repayment_period, guaranteed, guarantors,date_created) values(
                '$member_id',
                '$appl_no',
                '$application_date',
                '$amount',
                '$repayment_amount',
                '$emi',
                '$repayment_period,
                '$guaranteed',
                '$guarantors',
                '$date_created'
                )";
                mysqli_query($connection, $sql);
                */
            $sql=" UPDATE  member_contribution SET member_id=:member_id,payment_type=:service_id, contribution_amount=:amount, contribution_date=:invoice_date,txn_id=:txn_id WHERE id=:eid ";
            $sql="UPDATE  loan_application SET 
                member_id=:member_id,
                application_date=:appl_date,
                loan_amount=:loan_amount, 
                repayment_amount=:repayment_amount ,
                installment_amount=:emi, 
                repayment_period=:repayment_period, 
                guaranteed=:guaranteed, 
                guarantors=:guarantors
                WHERE appl_id=:eid ";
            $query=$dbh->prepare($sql);
            $query->bindParam(':member_id',$member_id,PDO::PARAM_STR);
            $query->bindParam(':appl_date',$application_date,PDO::PARAM_STR);
            $query->bindParam(':loan_amount',$amount,PDO::PARAM_STR);
            $query->bindParam(':repayment_amount',$repayment_amount,PDO::PARAM_STR);
            $query->bindParam(':emi',$emi,PDO::PARAM_STR);
            $query->bindParam(':repayment_period',$repayment_period,PDO::PARAM_STR);
            $query->bindParam(':guaranteed',$guaranteed,PDO::PARAM_STR);
            $query->bindParam(':guarantors',$guarantors,PDO::PARAM_STR);
            $query->bindParam(':eid', $loan_id, PDO::PARAM_STR);
            $query->execute();
            //$loan_id_insert = $dbh->lastInsertId();
            //delete guarantor feeds
            $count = $query->rowCount();

            mysqli_query($connection, "DELETE from loan_guarantors where loan_id='$loan_id' ");
           // $loan_id_insert = mysqli_insert_id($connection);
           if ($guarantors>0) {
            foreach( $guarantor as $key => $guarantr_id ) {
                $guarantor_id = $guarantr_id;
                $guarantot_amount = $guarantoramount[$key];
                $sqlg="INSERT into loan_guarantors(loan_id, guarantor, amount) values(:loan_id,:guarantor,:amount)";
                $queryg=$dbh->prepare($sqlg);
                $queryg->bindParam(':loan_id',$loan_id,PDO::PARAM_STR);
                $queryg->bindParam(':guarantor',$guarantor_id,PDO::PARAM_STR);
                $queryg->bindParam(':amount',$guarantot_amount,PDO::PARAM_STR);
                $queryg->execute();
            }
        }
            $last_insert = $dbh->lastInsertId();
            if ($count>0 || $last_insert>0) 
            {
                $audit_description = "Updated loan No. ".$appl_no." (" . get_membername_fromid($dbh,$member_id) ." )";
                audit_trail($dbh, $audit_description, $logged_inuser);
                echo "<script>window.location.href ='edit_loan_details.php?editid=$loan_id&op=ok'</script>";
            } 
           else 
            {
                echo "<script>window.location.href ='edit_loan_details.php?editid=$loan_id&op=3'</script>";
            }
        } else {
            echo "<script>window.location.href ='edit_loan_details.php?editid=$loan_id&op=1'</script>";
        }
    } else {
        echo "<script>window.location.href ='edit_loan_details.php?editid=$loan_id&op=2'</script>";
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
    <title>Badili Sacco | Loan Application</title>
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
    $sql="SELECT * from loan_application where appl_id=:eid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
        foreach($results as $rw)
        {   
            $member_id          =   $rw->member_id;
            $appl_no            =   $rw->appl_no;
            $application_date   =   $rw->application_date;
            $loan_amount        =   $rw->loan_amount;
            $repayment_amount   =   $rw->repayment_amount;
            $installment_amount =   $rw->installment_amount;
            $repayment_period   =   $rw->repayment_period; 
            $guaranteed         =   $rw->guaranteed; 
            $guarantors         =   $rw->guarantors;
            $date_created       =   $rw->date_created;    
        }
    }
   // print $application_date;
?>
<body class="nav-md">
<body onload="load_guarantors(<?php echo $guarantors; ?>,<?php echo $eid; ?> );load_view_loandetails(<?php echo $repayment_period; ?>,<?php echo $loan_amount; ?>);loadchosen()">
    <div class="container body">
        <div class="main_container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form method="post" id="laon_application" onsubmit="return ValidateForm()" novalidate enctype="multipart/form-data">
                                        <span class="section">Update Loan Application</span>
                                        <?php 
                                        if ($op=="ok") {
                                            ?>
                                            <div class="alert alert-success" role="alert">
                                                Loan Applied Successfully.
                                            </div>
                                        <?php
                                        }elseif ($op == "1") {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Update Failed try again! Amount applied exceeding your Limit.
                                            </div>
                                        <?php
                                        }elseif ($op == "2") {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Update Failed try again! Guarantors Amount exceeding their Limit.
                                            </div>
                                        <?php
                                        }
                                        elseif ($op == "3") {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Application Failed try again!.
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Application Date:<span class="required">*</span></label>
												<div class="col-md-9 col-sm-9">
													<input class="form-control datepick"  name="application_date" id="application_date" onChange="changeRepaymentstart(this.value)" value="<?php echo date("d-m-Y",strtotime($application_date));?>" required="required" />
												</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Member:<span class="required">*</span></label>
											<div class="col-md-9 col-sm-9">
												<select name="member_id" id="member_id" placeholder="Select Member ..." onChange="get_max_loan_amount(this.value)" class="form-control " required='true' disabled>
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
											<label class="col-form-label col-md-3 col-sm-3  label-align">Amount Requested: <span class="required">*</span></label>
											<div class="col-md-9 col-sm-9">
												<input class="form-control" type="number" class='number' name="amount" id="amount" onblur="load_repayment_period()" required='required' value="<?php echo $loan_amount; ?>">
                                            </div>
										</div>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Guaranteed?:</label>
											<div class="col-md-3 col-sm-3">
                                                <input type="checkbox" id="guaranteed" name="guaranteed" onclick="checkGuarantee()" value="<?php echo $guaranteed;?>">
                                                
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="guarantors"> Guarantors?</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <span id="guarantors_count" style="display: none;">
                                                    <select name="guarantors" id="guarantors" placeholder="Select Guarantors ..." onChange="load_guarantors(this.value,loan_e_id.value)" class="form-control " required='true'>
                                                        <?php
                                                        for ($icount=0; $icount < MAX_GUARANTORS ; $icount++) { 
                                                            ?>
                                                            <option value="<?php echo ($icount+1);?>" <?php if(($icount+1)==$guarantors) echo "selected";?>><?php echo ($icount+1);?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </span>
                                            </div>
										</div>
                                        <div id="guarantors_table">
                                        </div>
                                        <div id="repay_table">
                                        </div>
                                        <input type="hidden" id="guarantoramt" name="guarantoramt" value="1">
                                        <input type="hidden" id="loan_e_id" name="loan_e_id" value="<?php echo $eid;?>">
                                        <input type="hidden" id="repay_period" name="repay_period" value="<?php echo $repayment_period;?>">
                                        <input type="hidden" id="loan_no" name="loan_no" value="<?php echo $appl_no;?>">
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
                alert("Select member.");
                return false;
            }
            var application_date = document.getElementById("application_date").value;
            if (application_date=="") {
                alert("Fill in the Application Date.");
                return false;
            }
            var amount = document.getElementById("amount").value;
            if (amount=="") {
                alert("Fill in the Loan Amount.");
                return false;
            }
            var repayment_period = document.getElementById("repayment_period").value;
            if (repayment_period=="") {
                alert("Select the repayment period.");
                return false;
            }
            var guarantors = document.getElementById("guarantors").value;
            var checkbox = document.getElementById('guaranteed').value;
            if (checkbox == 1){
                for (var i = 0; i < (guarantors); i++) {
                    var guarantors_amount = document.getElementById("guarantoramount"+i).value;
                    var guarantor = document.getElementById("guarantor"+i).value;
                    if (guarantor=="") {
                        alert("Select the Guarantor.");
                        return false;
                    }
                    if (guarantors_amount=="") {
                        alert("Fill in the Guarantor Amount.");
                        return false;
                    }
                    check_guarantors_amount(guarantor,guarantors_amount);
                    var guarantoramt = document.getElementById("guarantoramt").value;
                    //alert(guarantoramt);
                    if (guarantoramt==="0") {
                        alert("Guarantor Amount Exceeds their Limit. Amend the value.");
                        return false;
                    }
                    //alert(check_guarantors_amount(guarantor,guarantors_amount));
                   /* var gdata = promise.success(function (data) {
                        return data;
                    });
                    alert(JSON.stringify(gdata));*/
                    /*if (data==="false") {
                        alert("Guarantor Amount Exceeds their Limit. Amend the value");
                        return false;
                    }*/
                }
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
    <script>
        function poptastic(url, width, height,win_name) {
         //window.open(url, width, windowHeight);
            //var xPos = (screen.width/2) - (windowWidth/2);
            ///var yPos = (screen.height/2) - (windowHeight/2);
            //window.open(url,description,"width="+ windowWidth+",height="+windowHeight +",left="+xPos+",top="+yPos);
            var newwin;
            var left   = (screen.width - width)/2;
            var top    = (screen.height - height)/2;
            var params = 'width='+width+', height='+height;
            params += ', top='+top+', left='+left;
            params += ', directories=no';
            params += ', location=no';
            params += ', menubar=no';
            params += ', resizable=yes';
            params += ', scrollbars=yes';
            params += ', status=no';
            params += ', toolbar=no';
            newwin=window.open(url,win_name, params);
            if (window.focus) {newwin.focus()}
            return false;
        }
        function get_max_loan_amount(member_id)
        {
            var rowData = {
                    member_id : member_id
                };
            $.ajax({
                type: "POST",
                url: "update_loan_amount.php",
                data: rowData,
                success: function(data){
                    var y = document.getElementById("amount");
                    y.value = parseInt(data);
                   // check_selected_member();
                   load_repayment_period();
                }
            });
        }
        function get_max_loan_amount_guarantor(member_id, amount_id)
        {
            var rowData = {
                    member_id : member_id
                };
            $.ajax({
                type: "POST",
                url: "update_loan_amount.php",
                data: rowData,
                success: function(data){
                    var y = document.getElementById(amount_id);
                    y.value = parseInt(data);
                   // check_selected_member();
                }
            });
        }
        function checkGuarantee()
        {
            var checkbox = document.getElementById('guaranteed');
            if (checkbox.checked == true)
            {
                //create dynamic Guarantors
                var y = document.getElementById("guarantors");
                y.value = "1";
                document.getElementById("guarantors_count").style.display = "";
                load_guarantors(1);
                load_repayment_period();
                checkbox.value = 1;
                loadchosen();
            }else{
                document.getElementById("guarantors_count").style.display = "none";
                var y = document.getElementById("guarantors");
                y.value = "";
                load_guarantors(0);
                load_repayment_period();
                checkbox.value = 0;
                loadchosen();
            }
        }
        function load_guarantors(guarantors,loan_id){
            if (guarantors >= 1) {
                var checkbox = document.getElementById('guaranteed');
                checkbox.checked = true;
                checkbox.value = 1;
                document.getElementById("guarantors_count").style.display = "";
                load_repayment_period();
                var rowData = {
                        guarantors : guarantors,
                        loan_id : loan_id
                    };
                $.ajax({
                    type: "POST",
                    url: "load_guarantors_edit.php",
                    data: rowData,
                    success: function(data){
                        var y = document.getElementById("guarantors_table");
                        y.innerHTML = data;
                        loadchosen();
                    }
                });
                
            }else{
                load_repayment_period();
            }
        }
        function load_repayment_period(){
            var loan_amount = document.getElementById("amount").value;
            var guarantors = document.getElementById("guarantors").value;
            var repay_period = document.getElementById("repay_period").value;
            var checkbox = document.getElementById('guaranteed').value;
            if (checkbox==='0') {
                guarantors = '0';
            }
            //alert(guarantors);
            var rowData = {
                    guarantors : guarantors,
                    loan_amount : loan_amount,
                    repay_period : repay_period
                };
            $.ajax({
                type: "POST",
                url: "update_loan_repayment_period_edit.php",
                data: rowData,
                success: function(data){
                    var y = document.getElementById("repay_table");
                    y.innerHTML = data;
                    var period = document.getElementById("repayment_period").value;
                    load_view_loandetails(period,loan_amount);
                }
            });
        }
        function load_view_loandetails(period,amount) {
            var rowData = {
                    period : period,
                    amount : amount
                };
            $.ajax({
                type: "POST",
                url: "view_loan_breakdown.php",
                data: rowData,
                success: function(data){
                    var y = document.getElementById("viewloanbreakdown");
                    y.innerHTML = data;
                }
            });
        }
        function check_selected_member(){
            var member_id = document.getElementById("member_id").value;
            var guarantors = document.getElementById("guarantors_count").value;
            get_max_loan_amount(member_id);
            var member_limit_amount = document.getElementById("amount").value;
            var arr = [];
            var guarantorsamt = 0;
            var checkbox = document.getElementById('guaranteed').value;
            if (checkbox === 1){
                alert(checkbox);
                for (var i = 0; i < (guarantors); i++) {
                    var guarantors_amount = document.getElementById("guarantoramount"+i).value;
                    guarantorsamt += guarantors_amount;
                }
            }
            //alert(guarantorsamt);
          //  var total_request  = guarantorsamt+member_limit_amount;
            //document.getElementById("amount").value = total_request;
            var y = document.getElementById("amount");
            y.value = parseInt(total_request);
            //console.log(arr);
        }
        function check_guarantors_amount(guarantor,g_amount){
            var rowData = {
                    guarantor : guarantor,
                    g_amount : g_amount
                };
                return $.ajax({
                type: "POST",
                url: "check_guarantor_amount.php",
                data: rowData,
                success: function(data){
                    var y = document.getElementById("guarantoramt");
                    y.value = data;
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
        $('#laon_application').on('submit', function() {
            $('input, select').prop('disabled', false);
        });
    </script>
    <script src="../vendor/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../vendor/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="../vendor/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="../vendor/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
    <script>
           $("#member_id").chosen();
        function loadchosen() {
            var guarantors_cnt = document.getElementById("guarantors").value;
            for (var i = 0; i < (guarantors_cnt); i++) {
            // alert(i);
                $("#guarantor"+i).chosen();
            }
        }
        
    </script>
    <script src="../vendor/jquery_date_picker/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#application_date" ).datepicker({
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
