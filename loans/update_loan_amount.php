<?php 
include('../includes/dbconnection.php');
include('../php_functions/functions.php');

$member_id = $_POST['member_id'];
$max_limit_amount = get_member_loanlimit($dbh, $member_id);

echo $max_limit_amount;


?>