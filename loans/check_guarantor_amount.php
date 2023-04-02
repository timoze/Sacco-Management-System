<?php 
ob_start();
include('../includes/dbconnection.php');
include('../php_functions/functions.php');

$guarantor = $_POST['guarantor'];
$loan_gamount = $_POST['g_amount'];
//$loan_period_limit = get_loan_repayment_period($loan_amount, $guarantors);
$max_guarantor_loan = get_member_loanlimit($dbh, $guarantor);
if ($loan_gamount>$max_guarantor_loan) {
    echo "0";
}
else {
    echo "1";
}
?>