<?php
ob_start();
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
include('../php_functions/email.php');
$logged_inuser = $_SESSION['member_id'];
$mail_configs = mail_configs();
if (isset($_POST['loan_id'])) {
	$loan_status            =   strip_tags($_POST['loan_status']);
	$comments               =   strip_tags($_POST['comments']);
	$approver               =   strip_tags($_POST['approver']);
    $loan_id                =   strip_tags($_POST['loan_id']);
    $repayment_start_date   =   strip_tags($_POST['repayment_start_date']);
    $disbursement_date = strip_tags($_POST['disbursement_date']);
    if ($loan_status == 2) {
        $loan_status = 3;
    }
    //$loan_details   =   loan_details_fromloanid($dbh, $loan_id);
    $repayment_period       =   strip_tags($_POST['repayment_period']);
    $loan_memberid          =   strip_tags($_POST['loan_memberid']);
    $amount                 =   strip_tags($_POST['loan_amount_approve']);
    $status = '0';
    $approval_date      =	date("Y-m-d H:i:s");
   // echo $approver;
    $sql=" UPDATE loan_application SET status=:status,comments=:comments, approval_date=:approval_date, approved_by=:approver WHERE appl_id =:eid and status=:stats";
    $query=$dbh->prepare($sql);
    $query->bindParam(':status',$loan_status,PDO::PARAM_STR);
    $query->bindParam(':comments',$comments,PDO::PARAM_STR);
    $query->bindParam(':approval_date',$approval_date,PDO::PARAM_STR);
    $query->bindParam(':approver',$approver,PDO::PARAM_STR);
    $query->bindParam(':eid', $loan_id, PDO::PARAM_STR);
    $query->bindParam(':stats', $status, PDO::PARAM_STR);
    $query->execute();
    $interest_breakdown =   loan_calculator_reducingbalance($amount, $repayment_period, INTEREST_RATE );
    $monthly_emi        =   calcPayment($amount, $repayment_period, INTEREST_RATE );
    //$LastInsertId=$dbh->lastInsertId();
    $count = $query->rowCount();
    if ($count>0) {
        if ($loan_status ==  1) {
            $audit_description = "Approved Member Loan Application  for (".get_membername_fromid($dbh,$loan_memberid).") Amount : ".$amount;
            $service_id = 5;
            $invoice_date = date("Y-m-d",strtotime($disbursement_date));
            $cr_dr = "C";
            $txn_id = "";
            $date_created =	date("Y-m-d H:i:s");
            $sql="INSERT into member_contribution(member_id,payment_type, cr_dr, loan_id, contribution_amount, date_created, contribution_date,created_by, txn_id) values(:member_id,:service_id, :cr_dr, :loan_id, :amount,:date_created, :invoice_date,:created_by,:txn_id)";
            $query_mbr_contrbtn=$dbh->prepare($sql);
            $query_mbr_contrbtn->bindParam(':member_id',$loan_memberid,PDO::PARAM_STR);
            $query_mbr_contrbtn->bindParam(':service_id',$service_id,PDO::PARAM_STR);
            $query_mbr_contrbtn->bindParam(':amount',$amount,PDO::PARAM_STR);
            $query_mbr_contrbtn->bindParam(':date_created',$date_created,PDO::PARAM_STR);
            $query_mbr_contrbtn->bindParam(':created_by',$approver,PDO::PARAM_STR);
            $query_mbr_contrbtn->bindParam(':invoice_date',$invoice_date,PDO::PARAM_STR);
            $query_mbr_contrbtn->bindParam(':txn_id',$txn_id,PDO::PARAM_STR);
            $query_mbr_contrbtn->bindParam(':cr_dr',$cr_dr,PDO::PARAM_STR);
            $query_mbr_contrbtn->bindParam(':loan_id',$loan_id,PDO::PARAM_STR);
            $query_mbr_contrbtn->execute();
            for ($i=0; $i < count($interest_breakdown) ; $i++) {
                $date_due = date('Y-m-d', strtotime($repayment_start_date . ' + ' . ($i+1) . ' months'));
                echo $date_due;
                $sqlschedule="INSERT into loan_schedule(loan_id,date_due, amount) values(:loan_id,:date_due,:amount)";
                $queryschedule=$dbh->prepare($sqlschedule);
                $queryschedule->bindParam(':loan_id',$loan_id,PDO::PARAM_STR);
                $queryschedule->bindParam(':date_due',$date_due,PDO::PARAM_STR);
                $queryschedule->bindParam(':amount',$monthly_emi,PDO::PARAM_STR);
                $queryschedule->execute();    
            }
            $audit_description = "Approved Member Loan Application  for (".get_membername_fromid($dbh,$loan_memberid).") Amount : ".$amount;
        }elseif ($loan_status ==  3) {
            $audit_description = "Declined Member Loan Application  for (".get_membername_fromid($dbh,$loan_memberid).") Amount : ".$amount;
        }
        //EMAIL APPLICANT
        //  $approver_name  = get_membername_fromid($dbh, $logged_inuser);
        $applicant_name = get_membername_fromid($dbh, $loan_memberid);
        $mail_message = "";
        $mail_message .= "Dear " . $applicant_name . ",<br><br>";  
        if ($loan_status ==  1) {
            $mail_message .= "Your loan Application has been <b><font color='green'>APPROVED</font></b>,<br><br>";
            $mail_message .= "<b>Loan Details: </b> <br>";
            $mail_message .= "<b>Loan Amount : </b> ".number_format($amount,2)." <br>";
            $mail_message .= "<b>Repayment Start Date: </b> ".date('d-m-Y',strtotime($repayment_start_date))." <br>";
            $mail_message .= "<b>Repayment Amount: </b> ".number_format(($monthly_emi*$repayment_period),2)." <br>";
            $mail_message .= "<b>Monthly Installment Amount: </b> ".number_format($monthly_emi,2)." <br>";
            $mail_message .= "<b>Repayment Period (months): </b> ".$repayment_period." <br>";
        } elseif ($loan_status ==  3) {
            $mail_message .= "Your loan Application has been <b><font color='red'>DECLINED</font></b>,<br><br>";
            $mail_message .= "<b>Loan Details: </b> <br>";
            $mail_message .= "<b>Loan Amount : </b> ".number_format($amount,2)." <br>";
            $mail_message .= "<b>Comments : </b> ".$comments." <br>";
        }

        $email_to = get_memberemail_fromid($dbh, $loan_memberid);
        $mail_subject = "Badili Sacco Loan Approval";
        sendEmail($mail_subject, $mail_message, $email_to , $mail_configs);

        //$audit_description = "Approved Mmember Loan Application  for (".get_membername_fromid($dbh,$loan_memberid).") Amount : ".$amount;
        audit_trail($dbh, $audit_description, $logged_inuser);
    } else {
    }
}
?>