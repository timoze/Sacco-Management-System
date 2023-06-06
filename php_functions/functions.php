<?php
ob_start();
include('../includes/dbconnection.php');
include('configurations.php');
function get_user_department($dbh, $department_id){
    $sql_items="SELECT department_name from user_department WHERE dept_id= :dept_id";
    $query_items = $dbh -> prepare($sql_items);
    $query_items->bindParam(':dept_id',$department_id,PDO::PARAM_STR);
    $query_items->execute();
    $results_items=$query_items->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_items as $rowclient) 
    {
        $department_name = $rowclient->department_name;
    }
    return $department_name;
}
function get_user_departmentfrom_id($dbh, $member_id){
    $sql_client="SELECT user_department from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
		$user_department = $rowclient->user_department;
    }
	//$member_name = $last_name;
    return $user_department;
}
function get_membername_fromid($dbh, $member_id){
    $sql_client="SELECT first_name, last_name from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
        $first_name = $rowclient->first_name;
		$last_name = $rowclient->last_name;
    }
	$member_name = $first_name . " ". $last_name;
    return $member_name;
}
function get_memberfirstname_fromid($dbh, $member_id){
    $sql_client="SELECT first_name from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
        $first_name = $rowclient->first_name;
    }
	$member_name = $first_name;
    return $member_name;
}
function get_memberlastname_fromid($dbh, $member_id){
    $sql_client="SELECT last_name from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
		$last_name = $rowclient->last_name;
    }
	$member_name = $last_name;
    return $member_name;
}
function get_memberprofile_fromid($dbh, $member_id){
    $sql_client="SELECT profile_image from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
		$profile_image = $rowclient->profile_image;
    }
    return $profile_image;
}
function get_memberemail_fromid($dbh, $member_id){
    $sql_client="SELECT email from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
		$email = $rowclient->email;
    }
    return $email;
}
function get_member_id_no_fromid($dbh, $member_id){
    $sql_client="SELECT id_no from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
		$id_no = $rowclient->id_no;
    }
    return $id_no;
}
function get_memberphone_fromid($dbh, $member_id){
    $sql_client="SELECT phone_no from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
		$phone_no = $rowclient->phone_no;
    }
    return $phone_no;
}
function get_memberkra_pin_fromid($dbh, $member_id){
    $sql_client="SELECT kra_pin from users WHERE member_id= :mem_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':mem_id',$member_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_client as $rowclient) 
    {
		$kra_pin = $rowclient->kra_pin;
    }
    return $kra_pin;
}
function audit_trail($dbh, $description, $member_id)
{
    // $username = get_membername_fromid($dbh, $member_id);
    $trail_date = date("Y-m-d H:i:s", time());
    //session_start();
    //$username = $_SESSION["username"];
    // $username = isset($_SESSION["username"]) ? $_SESSION["username"] : $username;
    $ip_addr = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    $status = 1;
    //$query = mysqli_query($dbh, "INSERT into audit_trail (trail_date, trail_desc, user_id, ip_addr trail_status) VALUES ('".$trail_date."','".$description."','".$member_id."','".$ip_addr."', '1')");
    $sql="insert into audit_trail(trail_date, trail_desc, user_id, ip_addr, trail_status)values(:date,:desc,:usrid,:ipadr,:status)";
    $query=$dbh->prepare($sql);
    $query->bindParam(':usrid', $member_id, PDO::PARAM_STR);
    $query->bindParam(':date', $trail_date, PDO::PARAM_STR);
    $query->bindParam(':desc', $description, PDO::PARAM_STR);
    $query->bindParam(':ipadr', $ip_addr, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
}
function get_payment_type_from_id($dbh, $payment_type){
    $sql_client="SELECT description from payment_items WHERE id= :typeid";
    $query_paytype = $dbh -> prepare($sql_client);
    $query_paytype->bindParam(':typeid',$payment_type,PDO::PARAM_STR);
    $query_paytype->execute();
    $results_paytype=$query_paytype->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_paytype as $rowpaytype) 
    {
		$type_name = $rowpaytype->description;
    }
    return $type_name;
}
function get_memberid_fromcontribution_id($dbh, $cntrb_id){
    $sql_query="SELECT member_id from member_contribution WHERE id= :cntrid";
    $query_mbrid = $dbh -> prepare($sql_query);
    $query_mbrid->bindParam(':cntrid',$cntrb_id,PDO::PARAM_STR);
    $query_mbrid->execute();
    $results_mbrid=$query_mbrid->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_mbrid as $rowmbr) 
    {
		$mbrid = $rowmbr->member_id;
    }
    return $mbrid;
}
function get_txnid_fromcontribution_id($dbh, $cntrb_id){
    $sql_query="SELECT txn_id from member_contribution WHERE id= :cntrid";
    $query_txn_id = $dbh -> prepare($sql_query);
    $query_txn_id->bindParam(':cntrid',$cntrb_id,PDO::PARAM_STR);
    $query_txn_id->execute();
    $results_txn_id=$query_txn_id->fetchAll(PDO::FETCH_OBJ);
    foreach ($results_txn_id as $row) 
    {
		$txn_id = $row->txn_id;
    }
    return $txn_id;
}
function getMonthlyPayments($dbh, $period, $member_id, $payment_item){
    if ($member_id=="All") {
        $member_query = "";
    }else{
        $member_query = " and member_id='$member_id' ";
    }
    for ($i=$period; $i >= 0; $i--) {
        $current_date = date("Y-m-01");
        $newdate = date("m-Y", strtotime($current_date." -$i months"));
        $newdates = date("M Y", strtotime($current_date." -$i months"));
        $sql6="SELECT sum(contribution_amount) as monthscontribution, DATE_FORMAT(contribution_date, '%m-%Y') as datepaid from member_contribution where DATE_FORMAT(contribution_date, '%m-%Y') = '$newdate'  and status='1' and payment_type='$payment_item' and cr_dr='D' $member_query ";
        $query6 = $dbh -> prepare($sql6);
        $query6->execute();
        $results6=$query6->fetchAll(PDO::FETCH_OBJ);
        $monthcontribution = 0;
        foreach ($results6 as $row6) {
            $monthcontribution += $row6->monthscontribution;
        }
        $payments_array[] = $monthcontribution;
        $date_array[] = $newdates;
    }
    return array($payments_array,$date_array);
}

function getItemPaymentsAsAt($as_at_date, $member_id, $payment_item){
    global $connection;

    if ($member_id=="All") {
        $member_query = "";
    }else{
        $member_query = " and member_id='$member_id' ";
    }
    //$monthcontribution = 0;
    $newdate = date("Y-m-d", strtotime($as_at_date));
    $query = mysqli_query($connection, "SELECT sum(contribution_amount) as monthscontribution from member_contribution where contribution_date < '$newdate'  and status='1' and payment_type='$payment_item' and cr_dr='D' $member_query ");
    //$pending_loan_array = array();
    $monthcontribution = 0;
    while ($row = mysqli_fetch_assoc($query) ) {
        $monthscontribution                 =   $row['monthscontribution'];
        $monthcontribution +=$monthscontribution;
    }
    return $monthcontribution;
}
function getMonthlyLoans($period, $dbh){
 for ($i=$period; $i >= 0; $i--) {
  $current_date = date("Y-m-01");
  $newdate = date("m-Y", strtotime($current_date." -$i months"));
  $newdates = date("M Y", strtotime($current_date." -$i months"));
 // $sql="SELECT invoice_id, repayment_amount, amount from  invoices WHERE client_id= :clientid and invoice_date between :dateo and :datei ";
  $sql6="SELECT sum(amount) as monthloans, DATE_FORMAT(invoice_date, '%m-%Y') as datepaid from invoices where DATE_FORMAT(invoice_date, '%m-%Y') = '$newdate' and status='1' ";
  $query6 = $dbh -> prepare($sql6);
  $query6->execute();
  $results6=$query6->fetchAll(PDO::FETCH_OBJ);
  foreach ($results6 as $row6) {
	  $monthloans=$row6->monthloans;
  }
  if ($monthloans>0) {
	$monthloans = $monthloans;
  }else{
	$monthloans = 0;
  }
  $loans_array[] = $monthloans;
  $date_array[] = $newdates;
}
return array($loans_array,$date_array);
}
function getTotalPaymentsLoans($dbh)
{
    $sql6 = "SELECT sum(amount) as monthloans from invoices where status='1'";
    $query6 = $dbh->prepare($sql6);
    $query6->execute();
    $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
    foreach ($results6 as $row6) {
        $monthloans = $row6->monthloans;
    }
    $sqls = "SELECT sum(amount_paid) as todaysale from invoice_items where status='1' ";
    $querys = $dbh->prepare($sqls);
    $querys->execute();
    $resultss = $querys->fetchAll(PDO::FETCH_OBJ);
    foreach ($resultss as $rows) {
        $monthsales = $rows->todaysale;
    }
    return array($monthsales, $monthloans);
}
function loan_calculator_reducingbalance($principal_amount, $period, $rate)
{
    //Formula
    //PR^N(R-1)/(R^N-1)
    //P((i × 1 + i)^n)/((1+i)^n - 1)
    $i = $rate / 100;
    $P = $principal_amount;
    $n = $period;
    if (LOAN_FORMULA == '1') {
        $amount_permonth = $P * (($i * 1 + $i) ^ $n) / ((1 + $i) ^ $n - 1);
        $nrate = 1 + ($rate / 100) / 12;
        // $amount_permonth =0;
        $amount_permonth = ($principal_amount * $nrate ^ $period * ($nrate - 1)) / ($nrate ^ $period - 1);
        $monthlypays = calcPayment($principal_amount, $period, $rate);
        $initial_amount = $principal_amount;
        $monthly_rate = $rate / 12;
        $loan_intrst = array();
        $principal_repays = 0;
        for ($i = 0; $i < $period; $i++) {
            //loop through the months with changing principal amount
            //interst per period = outstanding *rate
            $interest_charged = ($initial_amount * ($monthly_rate / 100)) ;
            $initial_amount = $initial_amount - ($monthlypays - $interest_charged);
            //$initial_amount = $initial_amount - $interest_charged;
            $loan_intrst[$i] = $interest_charged;
        }
    }elseif (LOAN_FORMULA == '2'){
        $loan_intrst = loan_calculator_flatrate($principal_amount, $period, $i);
    }
    return $loan_intrst;
}
/*function loan_calculator_flatrate($rate, $principal_amount, $period)
{
    //Formula
    //PR^N(R-1)/(R^N-1)
    $nrate = 1+($rate/12)/100;
    // $amount_permonth =0;
    //$amount_permonth = ($principal_amount + ($principal_amount * ($rate/100))) / $period;
    $amount_permonth = $principal_amount * (($rate / 100) / $period);
    $total_p_month = ($amount_permonth+$principal_amount)/$period;
    // $amount_permonth = ( $principal_amount * $nrate^$period * ($nrate-1) ) / ($nrate^$period  - 1 );
    return $total_p_month;
}*/
function loan_calculator_flatrate($principal_amount, $period, $rate) {
    //(Loan Amount x Interest Rate) / 12 x Repayment Period
    //return ($principal_amount * $rate) / (12 * $period);
    $loan_intrst = array();
    for ($i = 0; $i < $period; $i++) {

        $interest_charged = ($principal_amount * $rate) / (12 * $period);
       
        $loan_intrst[$i] = $interest_charged;
    }
    return $loan_intrst;
}
///MONTHLY REPAPAYMENT AMOUNT - REDUCING BALANCE
function calcPayment($loanAmount, $totalPayments, $irate)
{
    //***********************************************************
     //              rate * ((1 + rate) ^ TOTALPAYMENTS)
    // PMT = LOAN * -------------------------------------------
    //                  ((1 + rate) ^ TOTALPAYMENTS) - 1
    //***********************************************************
    $irate = $irate / 100;
    if (LOAN_FORMULA == '1') {
        $rate = $irate / 12;
        $value1 = $rate * pow((1 + $rate), $totalPayments);
        $value2 = pow((1 + $rate), $totalPayments) - 1;
        $pmt = $loanAmount * ($value1 / $value2);
    }elseif (LOAN_FORMULA == '2') {
        $pmt = monthly_repayment_flatrate($loanAmount, $totalPayments, $irate);
    }
    return $pmt;
}
///MONTHLY REPAPAYMENT AMOUNT - FLAT RATE METHOD
function monthly_repayment_flatrate($loanAmount, $totalPayments, $irate) {
    //(Loan Amount + (Loan Amount x Interest Rate)) / Repayment Period
    $pmt   =  ($loanAmount + ($loanAmount * $irate)) / $totalPayments;
    return $pmt;
}
//MAX REPAYMENT PERIOD PER THE SET RULES (per interest coeficient ) - reducing balance
function get_loan_repayment_period($amount, $guarantors)
{
    if ($guarantors == "0" || $guarantors == "") {
        $amount_coeficient = 5000;
    }elseif($guarantors == "1"){
        $amount_coeficient = 6000;
    }elseif($guarantors == "2"){
        $amount_coeficient = 7000;
    }else{
        $amount_coeficient = 8000;
    }
    // Define loan amount, interest rate, and repayment amount
    $loanAmount = $amount;
    $interestRate = INTEREST_RATE / 100;
    $repaymentAmount = $amount_coeficient;
    if (LOAN_FORMULA == '1') {
        // Calculate monthly interest rate
        $monthlyInterestRate = $interestRate / 12;
        // Initialize payment period and remaining loan balance
        $paymentPeriod = 0;
        $remainingLoanBalance = $loanAmount;
        // Calculate payment period and remaining loan balance until the loan is paid off
        while ($remainingLoanBalance > 0) {
            // Calculate interest for the current period
            $interest = $remainingLoanBalance * $monthlyInterestRate;
            // Calculate principal for the current period
            $principal = $repaymentAmount - $interest;
            // Decrease remaining loan balance by the principal amount
            $remainingLoanBalance -= $principal;
            // Increment payment period
            $paymentPeriod++;
        }
    }elseif (LOAN_FORMULA == '2'){
        $paymentPeriod = repayment_period_flatrate($loanAmount, $interestRate, $repaymentAmount);
    }
    // Output payment period
   return $paymentPeriod;
   // return ceil($amount/$amount_coeficient);
}
function repayment_period_flatrate($loan_amount, $interest_rate, $repayment_amount) {
    //(Loan Amount + (Loan Amount x Interest Rate)) / Repayment Amount
    $paymentPeriod = ($loan_amount + ($loan_amount * $interest_rate)) / $repayment_amount;
    return $paymentPeriod;
}
function calcPaymentperiod($loanAmount, $totalPayments, $irate)
{
    //***********************************************************
     //              rate * ((1 + rate) ^ TOTALPAYMENTS)
    // PMT = LOAN * -------------------------------------------
    //                  ((1 + rate) ^ TOTALPAYMENTS) - 1
    //***********************************************************
    $irate = $irate / 100;
    $rate = $irate / 12;
    $value1 = $rate * pow((1 + $rate), $totalPayments);
    $value2 = pow((1 + $rate), $totalPayments) - 1;
    $pmt    = $loanAmount * ($value1 / $value2);
    return $pmt;
}
//CLALCULATE LOAN INTEREST FROM LOAN REPAYMENT AMOUNT, RATE AND OUTSTANDING BALANCE
/*
function calculateInterest($emi, $interestRate, $outstandingLoanBalance, $period) {
    // convert annual interest rate to monthly rate
    $monthlyInterestRate = $interestRate / 12 / 100;
    // calculate interest paid
    /*$interestPaid = $emi - ($outstandingLoanBalance * $monthlyInterestRate);
    */
    /*$interestPaid = ($outstandingLoanBalance * $monthlyInterestRate) / $period;
    return $interestPaid;
}*/
function calculateInterest($outstandingLoanBalance, $interestRate, $emi) {
    if (LOAN_FORMULA == '1') {
        // convert annual interest rate to monthly rate
        $monthlyInterestRate = $interestRate / 12 / 100;
        // calculate interest paid for the repayment period
        $interestPaid = $outstandingLoanBalance * $monthlyInterestRate;
    }elseif (LOAN_FORMULA == '2') {
        // convert annual interest rate to monthly rate
        $monthlyInterestRate = $interestRate / 100;
        // calculate interest paid for the repayment period
        $interestPaid = $emi * $monthlyInterestRate;
    }
    // update outstanding loan balance
    $outstandingLoanBalance = $outstandingLoanBalance - ($emi - $interestPaid);
    return $interestPaid;
}
//CALCULATE MEMBER LOAN LIMIT
//80% of their contribution
//no outstanding loans
//No pending Guarantee amount
function get_member_loanlimit($dbh, $member_id)
{
    //check for outstanding loans
    $outstandingloans = get_outstanding_member_loans($member_id);
    if(count($outstandingloans)>=1){
        $total_cont_amount = 0;
    }else {
        //get 80% of the loan
        $total_contribution_amount = 0.8*(get_member_contribution($dbh, $member_id, 1));
        //check for guaranteed amount
        $total_amount_guaranteed =  get_member_guaranteed_amount($member_id);
        $total_cont_amount = $total_contribution_amount - $total_amount_guaranteed;
    }
    return $total_cont_amount;
}

function get_member_contribution($dbh, $member_id,$paytype)
{
    $cr_dr = 'D';
    $sql_query="SELECT contribution_amount from member_contribution WHERE member_id=:membrid and payment_type=:paytype and cr_dr=:crdr and status='1' ";
    $query_contribution = $dbh -> prepare($sql_query);
    $query_contribution->bindParam(':membrid',$member_id,PDO::PARAM_STR);
    $query_contribution->bindParam(':paytype',$paytype,PDO::PARAM_STR);
    $query_contribution->bindParam(':crdr',$cr_dr,PDO::PARAM_STR);
    $query_contribution->execute();
    $results_mbrid=$query_contribution->fetchAll(PDO::FETCH_OBJ);
    $total_cont_amount = 0;
    foreach ($results_mbrid as $rowmbr) 
    {
        $total_cont_amount += $rowmbr->contribution_amount;
    }
    return $total_cont_amount;
}

function check_loan_max_borrow($dbh, $member_id, $guarantors){
    $member_limit = get_member_loanlimit($dbh, $member_id);
    $guarantor_limit = 0;
    foreach( $guarantors as $key => $guarantr_id ) {
        $guarantor_limit += get_member_loanlimit($dbh, $guarantr_id);
    }
    $max_amount = $member_limit + $guarantor_limit;
    return $max_amount;
}
function check_guarantor($dbh, $guarantors_array, $amount_array){
    foreach( $guarantors_array as $key => $guarantr_id ) {
        $guarantor_limit = get_member_loanlimit($dbh, $guarantr_id);
        $guarantor_id = $guarantr_id;
        $guarantot_amount = $amount_array[$key];
        if ($guarantot_amount>$guarantor_limit) {
            return false;
        }
    }
    return true;
}
function loan_details_fromloanid($dbh, $loan_id){
    $loan_details = array();
    $sql="SELECT * from loan_application where appl_id=:loan_id";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':loan_id',$loan_id,PDO::PARAM_STR);
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
            $status             =   $rw->status;
            $interest_rate       =   $rw->interest_rate;
            $loan_formula       =   $rw->loan_formula;
            $loan_details[] = array($loan_id,$member_id, $appl_no, $application_date, $loan_amount, $repayment_amount, $installment_amount,$repayment_period,$guaranteed,$guarantors, $date_created, $status, $interest_rate, $loan_formula);
        }
    }
    return $loan_details;
}
function contribution_details_from_id($dbh, $contributon_id){
    $contribution_details = array();
    $sql="SELECT * from member_contribution where id=:contributon_id";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':contributon_id',$contributon_id,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
        foreach($results as $rw)
        {   
            $member_id              =   $rw->member_id;
            $cr_dr                  =   $rw->cr_dr;
            $loan_id                =   $rw->loan_id;
            $expense_id             =   $rw->expense_id;
            $payment_type           =   $rw->payment_type;
            $comments               =   $rw->comments;
            $contribution_date      =   $rw->contribution_date; 
            $contribution_amount    =   $rw->contribution_amount; 
            $txn_id                 =   $rw->txn_id;
            $date_created           =   $rw->date_created;
            $created_by             =   $rw->created_by;
            $status                 =   $rw->status;
            $contribution_details[] = array($contributon_id,$member_id, $cr_dr, $expense_id, $payment_type, $comments,$contribution_date,$contribution_amount,$txn_id, $date_created,$created_by, $status);
        }
    }
    return $contribution_details;
}
function get_loan_guarantors_fromloanid($dbh, $loan_id){
    $sql_query="SELECT id, guarantor,amount,status,approval_date from loan_guarantors WHERE loan_id= :loan_id";
    $query_amount = $dbh -> prepare($sql_query);
    $query_amount->bindParam(':loan_id',$loan_id,PDO::PARAM_STR);
    $query_amount->execute();
    $results_amount=$query_amount->fetchAll(PDO::FETCH_OBJ);
    $guarantor_array = array();
    foreach ($results_amount as $row) 
    {
		$amount = $row->amount;
        $guarantor = $row->guarantor;
        $status = $row->status;
        $approval_date = $row->approval_date;
        $id = $row->id;
        $guarantor_array[] = array($guarantor,$amount,$approval_date,$status,$id);
    }
    return $guarantor_array;
}
function get_guaranteed_amount_fromloanid($dbh, $loan_id){
    $sql_query="SELECT amount from loan_guarantors WHERE loan_id= :loan_id";
    $query_amount = $dbh -> prepare($sql_query);
    $query_amount->bindParam(':loan_id',$loan_id,PDO::PARAM_STR);
    $query_amount->execute();
    $results_amount=$query_amount->fetchAll(PDO::FETCH_OBJ);
    $amount = 0;
    foreach ($results_amount as $row) 
    {
		$amount += $row->amount;
    }
    return $amount;
}
function convert_number($number) 
{ 
	//separate shilling and cents
	$exp = explode(".",$number);
	$number = $exp[0];
	$cents = $exp[1];
	if(strlen($cents) == 1)
	{
		$cents = $cents.'0';
	}
	if($number)
	{
		if (($number < 0) || ($number > 9999999999)) 
		{ 
			throw new Exception("Number is out of range");
		} 
		$Bn = floor($number / 1000000000);  /* Billion (billion) */ 
		$number -= $Bn * 1000000000; 
		$Gn = floor($number / 1000000);  /* Millions (giga) */ 
		$number -= $Gn * 1000000; 
		$kn = floor($number / 1000);     /* Thousands (kilo) */ 
		$number -= $kn * 1000; 
		$Hn = floor($number / 100);      /* Hundreds (hecto) */ 
		$number -= $Hn * 100; 
		$Dn = floor($number / 10);       /* Tens (deca) */ 
		$n = $number % 10;               /* Ones */ 
		$res = ""; 
		if ($Bn) 
		{ 
			$res .= convert_number($Bn) . " Billion, "; 
		} 
		if ($Gn) 
		{ 
			$res .= convert_number($Gn) . " Million, "; 
		} 
		if ($kn) 
		{ 
			$res .= (empty($res) ? "" : " ") . 
			convert_number($kn) . " Thousand, "; 
		} 
		if ($Hn) 
		{ 
			$res .= (empty($res) ? "" : " ") . 
			convert_number($Hn) . " Hundred "; 
		} 
		$ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
						"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen"); 
		$tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety"); 
		if ($Dn || $n) 
		{ 
			if (!empty($res)) 
			{ 
				$res .= " and "; 
			} 
			if ($Dn < 2) 
			{ 
				$res .= $ones[$Dn * 10 + $n]; 
			} 
			else 
			{ 
				$res .= $tens[$Dn]; 
				if ($n) 
				{ 
					$res .= "-" . $ones[$n]; 
				} 
			} 
		} 
	}
	if($cents)
	{
		$Dn = floor($cents / 10);       /* Tens (deca) */ 
		$n = $cents % 10;               /* Ones */ 
		$res_cents = " "; 
		$ones_cents = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
			"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen"); 
		$tens_cents = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety"); 
		if ($Dn || $n) 
		{ 
			if (!empty($res_cents)) 
			{ 
				$res_cents .= " and "; 
			} 
			if ($Dn < 2) 
			{ 
				$res_cents .= $ones_cents[$Dn * 10 + $n]; 
			} 
			else 
			{ 
				$res_cents .= $tens_cents[$Dn]; 
				if ($n) 
				{ 
					$res_cents .= "-" . $ones_cents[$n]; 
				} 
			} 
			$res_cents .= " Cents "; 
		} 
	}
	if (empty($res)) 
	{ 
		$res = "zero"; 
	} 
	//$res = wordwrap($res .' ' . $res_cents,45,'<br>');
	return $res; 
} 
function check_loan_status($dbh,$loan_id){
    $staus = '0';
    $sql_query="SELECT guarantor from loan_guarantors WHERE loan_id=:loan_id and status=:statu";
    $query_check = $dbh -> prepare($sql_query);
    $query_check->bindParam(':loan_id',$loan_id,PDO::PARAM_STR);
    $query_check->bindParam(':statu',$staus,PDO::PARAM_STR);
    $query_check->execute();
    $results_amount=$query_check->fetchAll(PDO::FETCH_OBJ);
    //$number_of_rows = $query_check->fetchColumn(); 
    $quarantor_array = array();
    foreach ($results_amount as $row) 
    {
		$quarantor_array[] = $row->guarantor;
    }
    return count($quarantor_array);
}
function check_guarantor_status($connection, $loan_id){
    $query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT count(*) as total_count from loan_guarantor where loan_id='$loan_id' and status!='1' "));
    $total_count = $query['total_count'];
    return $total_count;
}

function member_loan_payments($member_id , $loan_id){
    global $connection;
    $loan_payments = mysqli_fetch_assoc(mysqli_query($connection, "SELECT sum(contribution_amount) as total_payments from  member_contribution where member_id='$member_id' and loan_id='$loan_id' and status=1 and cr_dr='D' "));
    $loan_paymentsmade = $loan_payments['total_payments'];
    return $loan_paymentsmade;
}
function member_loan_payments_period($member_id , $loan_id, $start_date, $end_date){
    global $connection;
    $loan_payments = mysqli_fetch_assoc(mysqli_query($connection, "SELECT sum(contribution_amount) as total_payments from  member_contribution where member_id='$member_id' and loan_id='$loan_id'  and status=1 and cr_dr='D' and contribution_date between '$start_date' and '$end_date' "));
    $loan_paymentsmade = $loan_payments['total_payments'];
    return $loan_paymentsmade;
}
function get_issued_member_loans($member_id){
    global $connection;
    $loans = mysqli_query($connection, "SELECT appl_id , loan_amount ,repayment_amount FROM loan_application WHERE status=1 and member_id='$member_id' order by appl_id DESC ");
    $issued_loan_array = array();
    while ($row = mysqli_fetch_assoc($loans) ) {
        $loan_id            = $row['appl_id'];
        $loan_amount        = $row['loan_amount'];
        $repayment_amount   = $row['repayment_amount'];
        //GET MEMBER LOAN PAYMENT
        //$loan_paymentsmade = member_loan_payments($member_id, $loan_id);
        $loan_paymentsmade = get_loan_principal_paid($loan_id);

       // if (($repayment_amount > $loan_paymentsmade) ) 
        {
            $total_bal = $loan_amount - $loan_paymentsmade;
            $issued_loan_array[] = array($loan_id,$loan_amount,$repayment_amount,$total_bal);
        }
    }
    return $issued_loan_array;
}

function get_outstanding_member_loans($member_id ){
    global $connection;
    $loans = mysqli_query($connection, "SELECT appl_id , loan_amount ,repayment_amount FROM loan_application WHERE status=1 and member_id='$member_id' order by appl_id DESC ");
    $pending_loan_array = array();
    while ($row = mysqli_fetch_assoc($loans) ) {
        $loan_id            = $row['appl_id'];
        $loan_amount        = $row['loan_amount'];
        $repayment_amount   = $row['repayment_amount'];
        //GET MEMBER LOAN PAYMENT
        //$loan_paymentsmade = member_loan_payments($member_id, $loan_id);
        $loan_principal_payments = get_loan_principal_paid($loan_id);

        if (($loan_amount > $loan_principal_payments) ) 
        {
            $total_bal = $loan_amount - $loan_principal_payments;
            $pending_loan_array[] = array($loan_id,$loan_amount,$repayment_amount,$total_bal);
        }
    }
    return $pending_loan_array;

}
function get_loan_interest_paid($loan_id){
    global $connection;
    $loan_interest = mysqli_query($connection, "SELECT interest_amount FROM loan_schedule WHERE status=1 and loan_id='$loan_id'  ");
    $total_interest = 0;
    while ($row = mysqli_fetch_assoc($loan_interest) ) {
        $interest_amount        = $row['interest_amount'];
        $total_interest += $interest_amount;
    }
    return $total_interest;
}
function get_loan_principal_paid($loan_id){
    global $connection;
    $loan_principal = mysqli_query($connection, "SELECT principal_paid FROM loan_schedule WHERE status=1 and loan_id='$loan_id'  ");
    $total_principal = 0;
    while ($row = mysqli_fetch_assoc($loan_principal) ) {
        $principal_amount  = $row['principal_paid'];
        $total_principal += $principal_amount;
    }
    return $total_principal;
}

function get_account_balance(){
    global $connection;
    $account_bal_query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT sum(if(cr_dr='D', (contribution_amount), (0-(contribution_amount)))) AS total_bal_amount from member_contribution WHERE status='1' "));
    $bal_amount = $account_bal_query['total_bal_amount'];
    return $bal_amount;
}

function get_member_guaranteed_amount($member_id ){
    global $connection;
    global $dbh;
   
    $loansguaranteed = mysqli_query($connection, "SELECT id, loan_id,amount FROM loan_guarantors WHERE (status in ('0','1')) and guarantor='$member_id'  order by id DESC ");
    //$pending_loan_array = array();
    $total_guaranteed = 0;
    while ($row = mysqli_fetch_assoc($loansguaranteed) ) {
        $gid                    =   $row['id'];
        $loan_id                =   $row['loan_id'];
        $amount                 =   $row['amount'];

      //  $total_guaranteed_amount =  get_guaranteed_amount_fromloanid($dbh, $loan_id);
       // $member_loan_payments =  member_loan_payments($member_id, $loan_id);
        if(check_loan_status_fromid($loan_id)>0){
            $total_guaranteed +=$amount;
        }
           
    }
    return $total_guaranteed;

}
function check_loan_status_fromid($loan_id){
    global $connection;
    $loans = mysqli_query($connection, "SELECT appl_id , loan_amount ,repayment_amount, member_id FROM loan_application WHERE status=1 and appl_id='$loan_id' order by appl_id DESC ");
   // $pending_loan_array = array();
    $loan_balance = 0;
    while ($row = mysqli_fetch_assoc($loans) ) {
        $loan_id            = $row['appl_id'];
        $loan_amount        = $row['loan_amount'];
        $repayment_amount   = $row['repayment_amount'];
        $member_id          = $row['member_id'];
        //GET MEMBER LOAN PAYMENT
       // $loan_paymentsmade = member_loan_payments($member_id, $loan_id);
        $loan_paymentsmade = get_loan_principal_paid($loan_id);
        $total_bal = $loan_amount - $loan_paymentsmade;
    }
    $loan_balance = $total_bal;
    return $loan_balance;
}


function get_role_name($dbh,$role_id){
    $sql_query="SELECT role from user_roles WHERE role_id= :role_id";
    $query_amount = $dbh -> prepare($sql_query);
    $query_amount->bindParam(':role_id',$role_id,PDO::PARAM_STR);
    $query_amount->execute();
    $results=$query_amount->fetchAll(PDO::FETCH_OBJ);
    foreach ($results as $row) 
    {
		$role = $row->role;
    }
    return $role;
}

function get_member_roles($member_id){

    global $dbh;

    $staus = "1";
    $sql="SELECT * from  user_role_assignment WHERE status= :staus and user_id=:memberid ";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':staus', $staus, PDO::PARAM_STR);
    $query->bindParam(':memberid', $member_id, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
   
    foreach ($results as $row) {
        $uroles     = $row->roles;
    }
    $user_roles_array = explode(", ", $uroles);

    return $user_roles_array;
}

function mail_configs(){
    $email_host     =   MAIL_HOST;
    $email_username =   MAIL_USERNAME;
    $email_port     =   MAIL_PORT;
    $email_ky       =   MAIL_PASSWORD;
    $from_name      =   'Badili Sacco Notifications';

    $mail_configs = array($email_host,$email_username, $email_port,$email_ky,$from_name);
    return $mail_configs;
}
function disbursement_date_from_loan_id($loan_id){
    global $connection;
    $disb_date_query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT contribution_date from member_contribution where  loan_id='$loan_id'  and status=1 and cr_dr='C' "));
    $disb_date = $disb_date_query['contribution_date'];
    return $disb_date;
}

function update_loan_schedule($loan_id, $val_date){

    global $dbh;

    $loan_details_array = loan_details_fromloanid($dbh,$loan_id);

    //disb date 
    $disb_date = disbursement_date_from_loan_id($loan_id);
    $period             =   $loan_details_array[0][7];
    $loan_principal     =   $loan_details_array[0][4];

    $staus = "1";
    $sql="SELECT id,loan_id,date_due, amount ,amount_paid,date_paid,status from  loan_schedule where loan_id=:eid  order by date_due ASC";
    $query = $dbh -> prepare($sql);
    //$query->bindParam(':staus',$staus,PDO::PARAM_STR);
    $query->bindParam(':eid',$loan_id,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=0;
    $total_loan_amount      =   0;
    $total_payment_amount   =   0;
    // $total_interest           =   0;
    //if ($query->rowCount() > 0) {
    $start_date1 = $disb_date;
    $member_id =  $loan_details_array[0][1];
    $start_date_array = array();
    $cnt = 0;
    $principal_bal = $loan_principal;
    $interestRate = $loan_details_array[0][12];
    $amount_paid = 0;
    foreach ($results as $row) {
        $id             =   $row->id ;
        $date_due       =   $row->date_due;
        $amount         =   $row->amount;
        //$amount_paid    =   $row->amount_paid;
        $date_paid      =   $row->date_paid;
        $bal = $amount - $amount_paid;
        $total_loan_amount += $amount;
        $total_payment_amount += $amount_paid;
        $start_date_array[] = $date_due;
        $end_date = $date_due;
        if ($cnt == '0') {
            $start_date = $start_date1;
        }else {
            $start_date = date('Y-m-d', strtotime($date_due . ' - 1 months'));
        }
        // print $start_date . "------->>>>>>>" . $end_date . "<br>";
        
        // $date_due = date('Y-m-d', strtotime($repayment_start_date . ' + ' . $i . ' months'));
        $amount_paid = member_loan_payments_period($member_id, $loan_id, $start_date, $end_date);

        //GET THE CURRENT OUTSTANDING BALANCE ON THE PRINCIPAL AMOUNT
        
        if ($amount_paid>0) {
            //GET THE LOAN INTEREST AMOUNT
            //$loan_interest = calculateInterest($amount, $interestRate, $loan_outstanding_principal, $repayment_period);
            $interest_paid = calculateInterest($principal_bal, $interestRate, $amount_paid);
            $principal_paid = $amount_paid-$interest_paid;
            
        }else{
            $interest_paid = 0;
            $principal_paid = 0;
        }
        if (strtotime($start_date)<strtotime($val_date) && strtotime($val_date)<=strtotime($end_date)) {
            $date_paid_val = $val_date;
        }else {
            $date_paid_val = $date_paid;
        } 
        $principal_bal = $principal_bal - $principal_paid;

        //if ($date_paid_val!='') 
        {
            $sql1=" UPDATE  loan_schedule SET amount_paid=:amount_paid, principal_paid=:principal_paid, interest_amount=:interest_amount, principal_bal=:principal_bal,date_paid=:date_paid WHERE id=:eid and loan_id=:loan_id ";
            $query1=$dbh->prepare($sql1);
            $query1->bindParam(':amount_paid', $amount_paid, PDO::PARAM_STR);
            $query1->bindParam(':principal_paid', $principal_paid, PDO::PARAM_STR);
            $query1->bindParam(':principal_bal', $principal_bal, PDO::PARAM_STR);
            $query1->bindParam(':interest_amount', $interest_paid, PDO::PARAM_STR);
            $query1->bindParam(':date_paid', $date_paid_val, PDO::PARAM_STR);
            $query1->bindParam(':loan_id', $loan_id, PDO::PARAM_STR);
            $query1->bindParam(':eid', $id, PDO::PARAM_STR);
            $query1->execute();  
        }
       /* else{
            $sql1=" UPDATE  loan_schedule SET amount_paid=:amount_paid, principal_paid=:principal_paid, interest_amount=:interest_amount, principal_bal=:principal_bal WHERE id=:eid and loan_id=:loan_id ";
            $query1=$dbh->prepare($sql1);
            $query1->bindParam(':amount_paid', $amount_paid, PDO::PARAM_STR);
            $query1->bindParam(':principal_paid', $principal_paid, PDO::PARAM_STR);
            $query1->bindParam(':principal_bal', $principal_bal, PDO::PARAM_STR);
            $query1->bindParam(':interest_amount', $interest_paid, PDO::PARAM_STR);
            $query1->bindParam(':loan_id', $loan_id, PDO::PARAM_STR);
            $query1->bindParam(':eid', $id, PDO::PARAM_STR);
            $query1->execute();  
        }*/
        $cnt ++;
    }

    return '1';

}

function get_loan_schedule_data($loan_id){
    global $dbh;
    $staus = "1";
    $sql="SELECT id,loan_id,date_due, amount ,amount_paid,date_paid,status,principal_paid,interest_amount,principal_bal from  loan_schedule where loan_id=:eid and status=:staus  ";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':staus', $staus, PDO::PARAM_STR);
    $query->bindParam(':eid', $loan_id, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=0;
    $data_array = array();
    foreach ($results as $row) {
        $id                 =   $row->id ;
        $date_due           =   $row->date_due;
        $amount             =   $row->amount;
        $date_paid          =   $row->date_paid;
        $amount_paid        =   $row->amount_paid;
        $principal_paid     =   $row->principal_paid;
        $interest_amount    =   $row->interest_amount;
        $principal_bal      =   $row->principal_bal;
        $data_array[$cnt] = array($id,$date_due,$amount,$amount_paid,$date_paid,$principal_paid,$interest_amount,$principal_bal);
        $cnt++;
    }
    return $data_array;
}



?>