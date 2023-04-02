<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
	
	//$id=  $_REQUEST['id'];

	$invoice_id=  $_REQUEST['invoice_id'];
	$statu =9;

	$sql="UPDATE member_contribution SET status=:statu where id=:eid";	
	$query=$dbh->prepare($sql);
	$query->bindParam(':eid',$invoice_id,PDO::PARAM_STR);
	$query->bindParam(':statu',$statu,PDO::PARAM_STR);
	$query->execute();



	echo "Invoice Deleted successful";

	echo "<script type='text/javascript'> window.close(); </script>";
	
}


?>