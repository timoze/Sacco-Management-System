<?php 
ob_start();
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
$period = $_POST['period'];
$loan_amount = $_POST['amount'];
$interest_rate = INTEREST_RATE;
//$view = '<a id="other" class="dropdown-item" href="javascript: void(0)" onclick=javascript:poptastic("./loan_table.php?principal_amount='.$loan_amount.'&period='.$period.'&rate='.$interest_rate.' ","750","800","view_loan_breakdown") title="Click to View" style="text-decoration:none">View Loan Breakdown</a>';
$printout = "";
    $printout .= '<div class="col-md-3 col-sm-3">
    <a href="javascript: void(0)" onclick=javascript:poptastic("./loan_table.php?principal_amount='.$loan_amount.'&period='.$period.'&rate='.$interest_rate.'",750,800,"view_loan_breakdown") title="Click to View Loan Breakdown" style="text-decoration:none">View Loan</a>
</div>';
echo $printout;
?>