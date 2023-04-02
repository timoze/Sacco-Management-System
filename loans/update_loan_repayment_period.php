<?php 
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
$guarantors = $_POST['guarantors'];
$loan_amount = $_POST['loan_amount'];
$loan_period_limit = get_loan_repayment_period($loan_amount, $guarantors);
$printout = "";

if (ADJUST_LOAN_PERIOD==1) {
  
    $printout .= '<div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Repayment Period  <span class="required">*</span></label>
                    <div class="col-md-3 col-sm-3">
                        <select name="repayment_period" id="repayment_period" placeholder="Select Repayment Period ..." onchange="load_view_loandetails(this.value,amount.value)" class="form-control " required="true">
                                    <option value=""></option>';
                                    for ($icount = 0; $icount < $loan_period_limit; $icount++) {
    $printout .= '                      <option value="'.($icount+1).'">'. ($icount+1).'</option>';
                                    }
    $printout .= '		</select>  
                    </div>
                    <div id="viewloanbreakdown">
                    </div>
                </div>';
}else{
    
    $printout .= '
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Repayment Period  <span class="required">*</span></label>
                    <div class="col-md-3 col-sm-3">
                        <input class="form-control number" type="number"  name="repayment_periods" id="repayment_periods" value='.$loan_period_limit.' required="required" placeholder="Mail Port" disabled="true">
                        <input class="form-control" type="hidden"  name="repayment_period" id="repayment_period" value='.$loan_period_limit.'></div>	
                        <div id="viewloanbreakdown">
                    </div>
                </div>';
}
echo $printout;
?>