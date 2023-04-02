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
    $user_department = get_user_departmentfrom_id($dbh, $logged_inuser);
    //print $user_department;
    $department_name = get_user_department($dbh, $department_id);
  	$com_nam = $company_name;
  	?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Badili Sacco | Loan Details </title>
	<!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
				$loan_id=intval($_GET['loan_id']);
                $loan_details_array = loan_details_fromloanid($dbh, $loan_id);
                $datereg = date("d-m-Y H:i:s",strtotime($date_registered));
                $logo = '../' . LOGO;
                $unchecked = "../images/unchecked.png";
                $checked = "../images/checked.png";
			?>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="x_panel">
						<div class="x_content">
							<table  width="100%" border="0"> 
								<tr bgcolor="#5c0e1e">
									<th colspan="2" style="text-align: left;"><img src="<?php echo $logo;?>" width="200" height="80"></th>	
                                    <th  style="text-align: right; color: white;">
                                        <?php echo COMPANY_NAME;?><br>
                                        <?php echo COMPANY_EMAIL;?><br>
                                        <?php echo COMPANY_ADDRESS;?> - <?php echo COMPANY_POSTALCODE;?><br>
                                        <?php echo COMPANY_TOWN;?> <br>
                                        <?php echo COMPANY_PHYSICAL_ADDRESS;?><br>
                                    </th>	
								</tr>
                                <tr>
									<td colspan="2"><B><font color="red" size=4>LOAN APPLICATION FORM</font></B></td>	
                                    <td style="text-align: right;"> 
                                        <b>Doc. No.:</b><font ><?php echo $loan_details_array[0][2];?></font><br>
                                        <b>Date :</b> <?php echo date("d/m/Y",strtotime($loan_details_array[0][3]));?>
                                    </td>	
								</tr>
                                <tr>
									<td colspan="3" style="text-align: left;"><B><font color="red">1. APPLICANT'S INFORMATION</font></B></td>	
								</tr>
                                <tr>
									<td colspan="3" width="100%">
                                        <table width="100%" border="1">
                                            <tr>
                                                <td colspan="2">
                                                    <b>Name of Borrower(as per ID document)</b>
                                                </td>
                                                <td colspan="3" width="75%">
                                                    <?php echo get_membername_fromid($dbh,$loan_details_array[0][1]);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td >
                                                    <b>Email Address:</b>
                                                </td>
                                                <td colspan="2">
                                                    <?php echo get_memberemail_fromid($dbh,$loan_details_array[0][1]);?>
                                                </td>
                                                <td >
                                                    <b>Phone number:</b>
                                                </td>
                                                <td >
                                                    <?php echo get_memberphone_fromid($dbh,$loan_details_array[0][1]);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td >
                                                    <b>ID. NO:</b>
                                                </td>
                                                <td colspan="2">
                                                    <?php echo get_member_id_no_fromid($dbh,$loan_details_array[0][1]);?>
                                                </td>
                                                <td >
                                                    <b>KRA Pin no.:</b>
                                                </td>
                                                <td >
                                                    <?php echo get_memberkra_pin_fromid($dbh,$loan_details_array[0][1]);?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>	
								</tr>
                                <tr>
									<td colspan="3" style="text-align: left;"><B><font color=red>2. LOAN PARTICULARS </font></B></td>	
								</tr>
                                <tr>
									<td colspan="3" width="100%">
                                        <table width="100%" border="1">
                                            <tr>
                                                <td>
                                                    <b>Amount in figures (KES.)</b>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php echo number_format($loan_details_array[0][4],2);?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <b>Repayment period (Months)</b>
                                                </td>
                                                <td style="text-align: left;">
                                                    <?php echo $loan_details_array[0][7];?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Amount in words</b>
                                                </td>
                                                <td width="80%" colspan="3">
                                                    <?php echo convert_number($loan_details_array[0][4]);?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>	
								</tr>
                                <tr>
									<td colspan="3" style="text-align: left;"><B><font color=red>3. DISBURSEMENT DETAILS </font></B></td>	
								</tr>
                                <tr>
                                    <td colspan="3" width="100%">
                                        <table width="100%" border="1">
                                            <tr>
                                                <td colspan="6"><B> Disbursement Method</B></td>	
                                            </tr>
                                            <tr>
                                                <td colspan="6">Bank Transfer <span> <img src="<?php echo $unchecked;?>" width="20px" height="20px"> </span> Mobile Money (M-PESA) <img src="<?php echo $checked;?>" width="20px" height="20px"> </span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"><B><font color="#5c0e1e"> Bank Transfer Details</font></B></td>	
                                            </tr>
                                            <tr>
                                                <td ><b>Account Name</b></td>	
                                                <td colspan="3"></td>	
                                                <td ><b>Account Number</b></td>	
                                                <td></td>	
                                            </tr>
                                            <tr>
                                                <td  width="16.66%"><b>Bank Name</b></td>	
                                                <td  width="16.66%">&nbsp;</td>	
                                                <td  width="16.66%"><b>Branch</b></td>	
                                                <td  width="16.66%">&nbsp;</td>	
                                                <td  width="16.66%"><b>Bank Code</b></td>	
                                                <td  width="16.66%">&nbsp;</td>	
                                            </tr>
                                            <tr>
                                                <td colspan="6"><B><font color="#5c0e1e"> M-PESA Details</font></B></td>	
                                            </tr>
                                            <tr>
                                                <td ><b>Phone number:</b></td>	
                                                <td ><?php echo get_memberphone_fromid($dbh,$loan_details_array[0][1]);?></td>	
                                                <td ><b>M-PESA Name</b></td>	
                                                <td colspan="3"><?php echo get_membername_fromid($dbh,$loan_details_array[0][1]);?></td>	
                                            </tr>
                                        </table>
                                    </td>
                                <tr>
									<td colspan="3" style="text-align: left;"><B><font color=red>4. GUARANTOR DETAILS </font></B></td>	
								</tr>
                                <tr>
                                    <td colspan="3" width="100%">
                                        <table width="100%" border="1">
                                            <tr>
                                                <td colspan="5"><B> Will this loan be guaranteed?*</B></td>	
                                            </tr>
                                            <tr> 
                                                <?php
                                                    if($loan_details_array[0][8]=='1'){                                       
                                                        ?>
                                                            <td colspan="5">Yes <span> <img src="<?php echo $checked;?>" width="20px" height="20px"> </span> No <span> <img src="<?php echo $unchecked;?>" width="20px" height="20px"> </span></td>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <td colspan="5">Yes <span> <img src="<?php echo $unchecked;?>" width="20px" height="20px"> </span> No <span> <img src="<?php echo $checked;?>" width="20px" height="20px"> </span> </td>
                                                        <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><font color=red>*Note:</font><br>
                                                    If not guaranteed, your loan amount is limited to 80% of your current savings. <br>
                                                    If guaranteed, please fill the guarantors' (maximum of <?php echo MAX_GUARANTORS; ?>) details below. They will also need to sign this form and shall be contacted before disbursement
                                                </td>	
                                            </tr>
                                            <?php
                                                if ($loan_details_array[0][8]=='1') {
                                                    $guarantor_details_array = get_loan_guarantors_fromloanid($dbh, $loan_id);
                                                    ?>
                                                        <tr>
                                                            <td colspan="5"><b >Guarantor Details</b><br></td>	
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;">Full Name</th>	
                                                            <th style="text-align: center;">ID Number</th>	
                                                            <th style="text-align: center;">Phone Number</th>	
                                                            <th style="text-align: center;">Amount</th>	
                                                            <th style="text-align: center;">Status</th>	
                                                        </tr>
                                                    <?php
                                                    $total_guaranteed = 0;
                                                    for ($g_count=0; $g_count <count($guarantor_details_array) ; $g_count++) {
                                                        $guarantorid            = $guarantor_details_array[$g_count][0];
                                                        $guarantoramount        = $guarantor_details_array[$g_count][1];
                                                        $guarantorapproval_date = $guarantor_details_array[$g_count][2];
                                                        $guarantorstatus        = $guarantor_details_array[$g_count][3];
                                                        $guarantoritem_id       = $guarantor_details_array[$g_count][4];
                                                        if ($guarantorstatus=="0") {      
                                                            $status_desc = '<font color=orange><b>PENDING</b></font>';
                                                          }elseif($guarantorstatus=="1"){  
                                                            $status_desc = '<font color=green><b>APPROVED</b></font>';
                                                          }elseif($guarantorstatus=="3"){
                                                            $status_desc = '<font color=red><b>DECLINED</b></font>';
                                                          }
                                                          ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo get_membername_fromid($dbh,$guarantorid);?>
                                                                </td>
                                                                <td>
                                                                    <?php echo get_member_id_no_fromid($dbh,$guarantorid);?>
                                                                </td>
                                                                <td>
                                                                    <?php echo get_memberphone_fromid($dbh,$guarantorid);?>
                                                                </td>
                                                                <td style="text-align: right;">
                                                                    <?php echo number_format($guarantoramount,2);?>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <?php echo $status_desc;?>
                                                                </td>
                                                            </tr>
                                                          <?php
                                                        $total_guaranteed += $guarantoramount;
                                                    }
                                                    ?>
                                                            <tr>
                                                                <th>
                                                                    &nbsp;
                                                                </th>
                                                                <th>
                                                                    &nbsp;
                                                                </th>
                                                                <th style="text-align: center;">
                                                                    Total:
                                                                </th>
                                                                <th style="text-align: right;">
                                                                    <?php echo number_format($total_guaranteed,2);?>
                                                                </th>
                                                                <th style="text-align: center;">
                                                                    &nbsp;
                                                                </th>
                                                            </tr>
                                                          <?php
                                                }
                                                ?>
                                        </table>
                                    </td>
								</tr>
                                <tr>
									<td colspan="3" style="text-align: left;"><B><font color=red>5. CONFIRMATION </font></B></td>	
								</tr>
                                <tr>
									<td colspan="3" width="100%">
                                        <table width="100%" border="1">
                                            <tr>
                                                <td colspan="2">
                                                    <b>Name of Borrower(as per ID document)</b>
                                                </td>
                                                <td style="text-align: center;" colspan="2">
                                                    <?php echo get_membername_fromid($dbh,$loan_details_array[0][1]);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="25%">
                                                    <b>Signature</b>
                                                </td>
                                                <td width="25%" style="text-align: center;" >
                                                    &nbsp;
                                                </td>
                                                <td width="25%" style="text-align: center;">
                                                    <b>Date:</b>
                                                </td>
                                                <td width="25%" style="text-align: left;">
                                                    <?php echo date("d/m/Y",strtotime($loan_details_array[0][3]));?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>	
								</tr>
                                <?php
                                    if($loan_details_array[0][11] == '0'){
                                        $pending    = $checked;
                                        $approved   = $unchecked;
                                        $denied     = $unchecked;
                                    }elseif ($loan_details_array[0][11] == '1') {
                                        $pending    = $unchecked;
                                        $approved   = $checked;
                                        $denied     = $unchecked;
                                    }elseif ($loan_details_array[0][11] == '3') {
                                        $pending    = $unchecked;
                                        $approved   = $unchecked;
                                        $denied     = $checked;
                                    }
                                ?>
                                <tr>
									<td colspan="3" style="text-align: left;"><B><font color=red>6.  APPROVAL (OFFICIAL USE ONLY) </font></B> Pending <span> <img src="<?php echo $pending;?>" width="20px" height="20px"> </span> Approved <span><img src="<?php echo $approved;?>" width="20px" height="20px"> </span> Denied <span><img src="<?php echo $denied;?>" width="20px" height="20px"> </span> </td>	
								</tr>
							</table>
							<div id="other" class="ln_solid">
								<div class="form-group">
									<div class="col-md-6 offset-md-3">
										<button type='button' name="print"  OnClick="window.print();" class="btn btn-primary">Print</button>
										<button type='button' onclick="window.close();" class="btn btn-success">Close</button>
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
<?php }  ?>