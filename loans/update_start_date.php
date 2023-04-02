<?php 
ob_start();
//include('../includes/dbconnection.php');
include('../php_functions/functions.php');

$disb_date = $_POST['disb_date'];

$repayment_startdate = date('d-m-Y', strtotime($disb_date. ' + '.GRACE_PERIOD.' days'));

echo $repayment_startdate;

?>