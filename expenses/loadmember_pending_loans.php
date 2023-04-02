<?php 
include('../includes/dbconnection.php');
include('../php_functions/functions.php');

$member_id = $_POST['member_id'];
$payment_item = $_POST['payment_item'];
$get_loan_id = $_POST['loan_id'];

if ($payment_item == 5) {
    //SELECT ALL APPROVED LOANS WITH BALANCE AMOUNT
    
    //$loan_amount_paid = get_member_loan_contribution($dbh, $member_id,$loan_id);
    $loans = mysqli_query($connection, "SELECT appl_id , loan_amount ,repayment_amount FROM loan_application WHERE status=1 and member_id='$member_id' order by appl_id DESC ");
    $pending_loan_array = array();
    while ($row = mysqli_fetch_assoc($loans) ) {
        $loan_id            = $row['appl_id'];
        $loan_amount        = $row['loan_amount'];
        $repayment_amount   = $row['repayment_amount'];
        //GET MEMBER LOAN PAYMENT
        /*$loan_payments = mysqli_fetch_assoc(mysqli_query($connection, "SELECT sum(contribution_amount) as total_payments from  member_contribution where member_id='$member_id' and loan_id='$loan_id' and status=1 and cr_dr='D' "));
        $loan_paymentsmade = $loan_payments['total_payments'];
        */
        $loan_paymentsmade = member_loan_payments($member_id, $loan_id);

        if (($repayment_amount > $loan_paymentsmade) || ($get_loan_id==$loan_id) ) 
        {
            $total_bal = $repayment_amount - $loan_paymentsmade;
            $pending_loan_array[] = array($loan_id,$loan_amount,$repayment_amount,$total_bal);
        }
    }

    $printout = "";
    if (count($pending_loan_array)>=1) {
        $printout .= '<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Loan Paid <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9">
            

                <select name="loan_id" id="loan_id" placeholder="Select Loan ..." class="form-control " required="true">
													';
        for ($icount = 0; $icount < count($pending_loan_array); $icount++) {
            $selected = "";
            if ($pending_loan_array[$icount][0] == $get_loan_id) {
                $selected = "selected";
            }
            $printout .= '		<option value="'.$pending_loan_array[$icount][0].'" '.$selected.'  >Amount '. number_format($pending_loan_array[$icount][1]).' - Bal '. number_format($pending_loan_array[$icount][3],2).' </option>';
        }

        $printout .= '		</select>  
       
        </div>
       
    </div>';

    }else {
        $printout = '<div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Pending Loans<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9"><font color=red>No pending Loans
        <input type="hidden" name="loan_id" id="loan_id" value="" />
        </font></div></div>';
    }

}


echo $printout;


?>