<?php

include('dbconnection.php');

function get_amount_paid($dbh, $invoice_id){

    $sql_items="SELECT amount_paid from  invoice_items WHERE invoice_id= :invoice_i";
    $query_items = $dbh -> prepare($sql_items);
    $query_items->bindParam(':invoice_i',$invoice_id,PDO::PARAM_STR);
    $query_items->execute();
    $results_items=$query_items->fetchAll(PDO::FETCH_OBJ);
    $total_paid = 0;
    foreach ($results_items as $rs) 
    {
        $amountpaid = $rs->amount_paid;

        $total_paid +=$amountpaid; 
    }
    return $total_paid;
}

function get_clientname_fromid($dbh, $client_id){
    $sql_client="SELECT ContactName from  tblclient WHERE ID= :client_id";
    $query_client = $dbh -> prepare($sql_client);
    $query_client->bindParam(':client_id',$client_id,PDO::PARAM_STR);
    $query_client->execute();
    $results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
    
    foreach ($results_client as $rowclient) 
    {
        $client_name = $rowclient->ContactName;
    }
    return $client_name;
}

function getClientbalance($clientid, $dbh)
{	
	//CHECK CLIENT INVOICES

	$sql="SELECT invoice_id, repayment_amount from  invoices WHERE client_id= :clientid ";
	$query_details = $dbh -> prepare($sql);
	$query_details->bindParam(':clientid',$clientid,PDO::PARAM_STR);
	$query_details->execute();

	$results=$query_details->fetchAll(PDO::FETCH_OBJ);

	$total_amnt_paid = 0;
	$total_repay_amt = 0;
	$total_bal_due = 0;

	foreach($results as $row)
	{
		$inv_id = $row->invoice_id;

		$repay_amt = $row->repayment_amount;

		$sql_inv_items="SELECT sum(amount_paid) as amount_pai from  invoice_items WHERE invoice_id=:inv_id group by invoice_id";
		$query_inv_items = $dbh -> prepare($sql_inv_items);
		$query_inv_items->bindParam(':inv_id',$inv_id,PDO::PARAM_STR);
		$query_inv_items->execute();
		$results_items=$query_inv_items->fetchAll(PDO::FETCH_OBJ);
		$amnt_paid = 0;
		foreach ($results_items as $rs) 
		{
			$amnt_pa = $rs->amount_pai;
			$amnt_paid = $amnt_paid+$amnt_pa;
		}
									
		//$amnt_paid = $results_items->amount_pai;

		$total_amnt_paid = $amnt_paid+$total_amnt_paid;

		$total_repay_amt =$repay_amt + $total_repay_amt; 

	}
	$total_bal_due = $total_repay_amt - $total_amnt_paid;	
	return $total_bal_due;

}

function getClientbalance_array($clientid, $dbh)

{	
	//CHECK CLIENT INVOICES

	$sql="SELECT invoice_id, repayment_amount from  invoices WHERE client_id= :clientid ";
	$query_details = $dbh -> prepare($sql);
	$query_details->bindParam(':clientid',$clientid,PDO::PARAM_STR);
	$query_details->execute();

	$results=$query_details->fetchAll(PDO::FETCH_OBJ);

	$total_amnt_paid = 0;
	$total_repay_amt = 0;
	$total_bal_due = 0;

	foreach($results as $row)
	{
		$inv_id = $row->invoice_id;

		$repay_amt = $row->repayment_amount;

		$sql_inv_items="SELECT sum(amount_paid) as amount_pai from  invoice_items WHERE invoice_id=:inv_id group by invoice_id";
		$query_inv_items = $dbh -> prepare($sql_inv_items);
		$query_inv_items->bindParam(':inv_id',$inv_id,PDO::PARAM_STR);
		$query_inv_items->execute();
		$results_items=$query_inv_items->fetchAll(PDO::FETCH_OBJ);
		$amnt_paid = 0;
		foreach ($results_items as $rs) 
		{
			$amnt_pa = $rs->amount_pai;
			$amnt_paid = $amnt_paid+$amnt_pa;
		}
									
		//$amnt_paid = $results_items->amount_pai;

		$total_amnt_paid = $amnt_paid+$total_amnt_paid;

		$total_repay_amt =$repay_amt + $total_repay_amt; 

	}
	$total_bal_due = array($total_repay_amt,$total_amnt_paid);	
	return $total_bal_due;

}

function getClientbalance_debtors($clientid, $dbh)

{	
	//CHECK CLIENT INVOICES

	$sql="SELECT invoice_id, repayment_amount from  invoices WHERE client_id= :clientid ";
	$query_details = $dbh -> prepare($sql);
	$query_details->bindParam(':clientid',$clientid,PDO::PARAM_STR);
	$query_details->execute();

	$results=$query_details->fetchAll(PDO::FETCH_OBJ);

	$total_amnt_paid = 0;
	$total_repay_amt = 0;
	$total_bal_due = 0;
	//$date_array[] = "";

	foreach($results as $row)
	{
		$inv_id = $row->invoice_id;

		$repay_amt = $row->repayment_amount;

		$sql_inv_items="SELECT sum(amount_paid) as amount_pai, max(repayment_date) as repayment_date from  invoice_items WHERE invoice_id=:inv_id group by invoice_id";
		$query_inv_items = $dbh -> prepare($sql_inv_items);
		$query_inv_items->bindParam(':inv_id',$inv_id,PDO::PARAM_STR);
		$query_inv_items->execute();
		$results_items=$query_inv_items->fetchAll(PDO::FETCH_OBJ);
		$amnt_paid = 0;
		foreach ($results_items as $rs) 
		{
			$amnt_pa = $rs->amount_pai;
			$amnt_paid = $amnt_paid+$amnt_pa;
			$date_array[] = strtotime($rs->repayment_date);
		}
									
		//$amnt_paid = $results_items->amount_pai;

		$total_amnt_paid = $amnt_paid+$total_amnt_paid;

		$total_repay_amt =$repay_amt + $total_repay_amt; 

	}
	$date_repay_max = max($date_array);
	$total_bal_due = array($total_repay_amt,$total_amnt_paid, $date_repay_max);	
	return $total_bal_due;

}

function getClientbalance_date($clientid, $date1, $date2, $dbh)
{	
	//CHECK CLIENT INVOICES

	$sql="SELECT invoice_id, repayment_amount, amount from  invoices WHERE client_id= :clientid and invoice_date between :dateo and :datei and status='1' ";
	$query_details = $dbh -> prepare($sql);
	$query_details->bindParam(':clientid',$clientid,PDO::PARAM_STR);
	$query_details->bindParam(':dateo',$date1,PDO::PARAM_STR);
	$query_details->bindParam(':datei',$date2,PDO::PARAM_STR);
	$query_details->execute();

	$results=$query_details->fetchAll(PDO::FETCH_OBJ);

	$total_amnt_paid = 0;
	$total_repay_amt = 0;
	$total_bal_due = 0;
	$total_amt  = 0;

	foreach($results as $row)
	{
		$inv_id = $row->invoice_id;

		$repay_amt 	= $row->repayment_amount;
		$amount 	= $row->amount;

		/*$sql_inv_items="SELECT sum(amount_paid) as amount_pai from  invoice_items WHERE invoice_id=:inv_id and date_paid between :date1 and :date2 group by invoice_id";
		$query_inv_items = $dbh -> prepare($sql_inv_items);
		$query_inv_items->bindParam(':inv_id',$inv_id,PDO::PARAM_STR);
		$query_inv_items->bindParam(':date1',$date1,PDO::PARAM_STR);
		$query_inv_items->bindParam(':date2',$date2,PDO::PARAM_STR);
		$query_inv_items->execute();
		$results_items=$query_inv_items->fetchAll(PDO::FETCH_OBJ);
		$amnt_paid = 0;
		foreach ($results_items as $rs) 
		{
			$amnt_pa = $rs->amount_pai;
			$amnt_paid = $amnt_paid+$amnt_pa;
		}
			*/						
		//$amnt_paid = $results_items->amount_pai;

		$total_amt = $amount + $total_amt;

		$total_repay_amt =$repay_amt + $total_repay_amt; 

	}
	$total_bal_due = array($total_amt, $total_repay_amt);	
	return $total_bal_due;

}
function getClientpayments($clientid, $date1, $date2, $dbh)

{	
	//CHECK CLIENT INVOICES

	$sql="SELECT invoice_id, repayment_amount from  invoices WHERE client_id= :clientid and status='1' ";
	$query_details = $dbh -> prepare($sql);
	$query_details->bindParam(':clientid',$clientid,PDO::PARAM_STR);
	$query_details->execute();

	$results=$query_details->fetchAll(PDO::FETCH_OBJ);

	$total_amnt_paid = 0;
	$total_repay_amt = 0;
	$total_bal_due = 0;

	foreach($results as $row)
	{
		$inv_id = $row->invoice_id;

		$repay_amt = $row->repayment_amount;

		$sql_inv_items="SELECT sum(amount_paid) as amount_pai from  invoice_items WHERE invoice_id=:inv_id and date_paid between :date1 and :date2 and status='1' group by invoice_id";
		$query_inv_items = $dbh -> prepare($sql_inv_items);
		$query_inv_items->bindParam(':inv_id',$inv_id,PDO::PARAM_STR);
		$query_inv_items->bindParam(':date1',$date1,PDO::PARAM_STR);
		$query_inv_items->bindParam(':date2',$date2,PDO::PARAM_STR);
		$query_inv_items->execute();
		$results_items=$query_inv_items->fetchAll(PDO::FETCH_OBJ);
		$amnt_paid = 0;
		foreach ($results_items as $rs) 
		{
			$amnt_pa = $rs->amount_pai;
			$amnt_paid = $amnt_paid+$amnt_pa;
		}
									
		//$amnt_paid = $results_items->amount_pai;

		$total_amnt_paid = $amnt_paid+$total_amnt_paid;

		$total_repay_amt =$repay_amt + $total_repay_amt; 

	}
	//$total_bal_due[] = $total_amnt_paid;	
	return $total_amnt_paid;

}

function getMonthlyPayments($period, $dbh){
	for ($i=$period; $i >= 0; $i--) {
	 $current_date = date("Y-m-01");

	 $newdate = date("m-Y", strtotime($current_date." -$i months"));
	 $newdates = date("M Y", strtotime($current_date." -$i months"));

	 $sql6="SELECT sum(amount_paid) as todaysale, DATE_FORMAT(date_paid, '%m-%Y') as datepaid from invoice_items where DATE_FORMAT(date_paid, '%m-%Y') = '$newdate'  and status='1' ";

	 $query6 = $dbh -> prepare($sql6);
	 $query6->execute();
	 $results6=$query6->fetchAll(PDO::FETCH_OBJ);
	 foreach ($results6 as $row6) {
		 $monthsales=$row6->todaysale;
	 }
	 if ($monthsales>0) {
	   $monthsales = $monthsales;
	 }else{
	   $monthsales = 0;
	 }
	 $payments_array[] = $monthsales;
	 $date_array[] = $newdates;
 }
 return array($payments_array,$date_array);
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
function getTotalPaymentsLoans($dbh){

$sql6="SELECT sum(amount) as monthloans from invoices where status='1'";

$query6 = $dbh -> prepare($sql6);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
foreach ($results6 as $row6) {
	$monthloans=$row6->monthloans;
}

 $sqls="SELECT sum(amount_paid) as todaysale from invoice_items where status='1' ";

	 $querys = $dbh -> prepare($sqls);
	 $querys->execute();
	 $resultss=$querys->fetchAll(PDO::FETCH_OBJ);
	 foreach ($resultss as $rows) {
		 $monthsales=$rows->todaysale;
	 }
return array($monthsales, $monthloans);
} 

?>