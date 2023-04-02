<?php
ob_start();
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
include('../php_functions/email.php');
$logged_inuser = $_SESSION['member_id'];
$mail_configs = mail_configs();
if (isset($_POST['guarantor_item_id'])) {
	$loan_status        =   strip_tags($_POST['loan_status']);
	$comments           =   strip_tags($_POST['comments']);
	$guarantor_item_id  =   strip_tags($_POST['guarantor_item_id']);
    $loan_id_guarantor  =   strip_tags($_POST['loan_id_guarantor']);
    $guarantor_id       =   strip_tags($_POST['guarantor_id']);
    $amountguaranteed   =   strip_tags($_POST['amountguaranteed']);
    if ($loan_status == 2) {
        $loan_status = 3;
    }
    $loan_details =  loan_details_fromloanid($dbh, $loan_id_guarantor);
    $appl_no            =   $loan_details[0][2];
    $loan_memberid      =   $loan_details[0][1];
    $loan_amount        =   $loan_details[0][4];
    $emi                =   $loan_details[0][6];
    $repayment_amount   =   $loan_details[0][5];
    $repayment_period   =   $loan_details[0][7];

    $status = '0';
    $approval_date      =	date("Y-m-d H:i:s");
    $sql=" UPDATE  loan_guarantors SET status=:status,comments=:comments, approval_date=:approval_date WHERE id=:eid and loan_id=:loan_id and guarantor=:guarantorid and status=:stats";
    $query=$dbh->prepare($sql);
    $query->bindParam(':status',$loan_status,PDO::PARAM_STR);
    $query->bindParam(':comments',$comments,PDO::PARAM_STR);
    $query->bindParam(':approval_date',$approval_date,PDO::PARAM_STR);
    $query->bindParam(':loan_id',$loan_id_guarantor,PDO::PARAM_STR);
    $query->bindParam(':guarantorid',$guarantor_id,PDO::PARAM_STR);
    $query->bindParam(':eid', $guarantor_item_id, PDO::PARAM_STR);
    $query->bindParam(':stats', $status, PDO::PARAM_STR);
    $query->execute();
    if ($loan_status ==  3) {
        // if guarantee request is declined - decline the entire loan and ask user to request a new loan
        $main_comments = "Declined by Guarantor. <br>".$comments;
        $sqlloan=" UPDATE loan_application SET status=:status,comments=:comments, approval_date=:approval_date, approved_by=:approver WHERE appl_id =:eid and status=:stats";
        $queryloan=$dbh->prepare($sqlloan);
        $queryloan->bindParam(':status',$loan_status,PDO::PARAM_STR);
        $queryloan->bindParam(':comments',$main_comments,PDO::PARAM_STR);
        $queryloan->bindParam(':approval_date',$approval_date,PDO::PARAM_STR);
        $queryloan->bindParam(':approver',$guarantor_id,PDO::PARAM_STR);
        $queryloan->bindParam(':eid', $loan_id_guarantor, PDO::PARAM_STR);
        $queryloan->bindParam(':stats', $status, PDO::PARAM_STR);
        $queryloan->execute();
    }
    //$LastInsertId=$dbh->lastInsertId();
    $count = $query->rowCount();
    if ($count>0) {
        //SEND MAIL TO APPLICANT
        $approver_name  = get_membername_fromid($dbh, $logged_inuser);
        $applicant_name = get_membername_fromid($dbh, $loan_memberid);
        $mail_message = "";
        $mail_message .= "Dear " . $applicant_name . ",<br><br>";  
        if ($loan_status ==  1) {
            $audit_description = "Approved Guarantee for Loan Application No. (".$appl_no.")  for (".get_membername_fromid($dbh,$loan_memberid).") Amount : ".$amountguaranteed;
            $mail_message .= "Your Loan Guarantee Request has been <b><font color='green'>APPROVED</font></b> by ".$approver_name.",<br><br>";
            $mail_message .= "<b>Loan Details: </b> <br>";
            $mail_message .= "<b>Loan Amount : </b> ".number_format($loan_amount,2)." <br>";
            $mail_message .= "<b>Amount Guaranteed: </b> ".$amountguaranteed." <br>";
        } elseif ($loan_status ==  3) {
            $audit_description = "Declined Guarantee Request for Loan Application No. (".$appl_no.")  for (".get_membername_fromid($dbh,$loan_memberid).") Amount : ".$amountguaranteed;
            $mail_message .= "Your Loan Guarantee Request has been <b><font color='red'>DECLINED</font></b> by ".$approver_name.",<br><br>";
            $mail_message .= "<b>Loan Details: </b> <br>";
            $mail_message .= "<b>Loan Amount : </b> ".number_format($loan_amount,2)." <br>";
            $mail_message .= "<b>Amount Guaranteed Request: </b> ".$amountguaranteed." <br>";
            $mail_message .= "<b>Comments : </b> ".$comments." <br>";
        }

        $email_to = get_memberemail_fromid($dbh, $loan_memberid);
        $mail_subject = "Badili Sacco Loan Guarantor Approval";
        sendEmail($mail_subject, $mail_message, $email_to , $mail_configs);


        //send mail to treasurer for approval
        //check if all gurantors have approved

        $guarantor_array =  get_loan_guarantors_fromloanid($dbh, $loan_id_guarantor);
        $statusarray = array();
        $total_guaranteed = 0;
        $guaranteed = 1;
        for ($ij=0; $ij < count($guarantor_array); $ij++) {
            $status_val = $guarantor_array[$ij][3];
            $total_guaranteed += $guarantor_array[$ij][1];
            $statusarray[$ij] = $status_val;
        }

        if (!in_array('0',$statusarray)) {
            //EMAIL SEC, CHAIR, TREASURER, VC, VSEC
            $email_to_array = array();
            $query_email_users = (mysqli_query($connection,"SELECT member_id, email from users where status='1' and (user_department NOT IN  ('1')) "));
            while ($row= mysqli_fetch_assoc($query_email_users) ) {
                    $mail_user = $row['email'];
                    $email_to_array[] = $mail_user;
            }
            $email_subject = "Loan Approval Request Application";
            
            $message = "";

            $message .= "Greetings,<br><br>";
            $message .= "Loan Application by " . $applicant_name . " has been <b><font color='green'>APPROVED</font></b> by Guarantors,<br><br>";
            $message .= "<b>Loan Details: </b> <br>";

            $message .= "<b>Loan Amount : </b> ".number_format($loan_amount,2)." <br>";
            if ($guaranteed==1) {
                $message .= "<b>Guarantors: </b> ".count($guarantor_array)." <br>";
                $message .= "<b>Guaranteed Amount: </b> ".number_format($total_guaranteed,2)." <br>";
            }
            $message .= "<b>Repayment Amount : </b> ".number_format($repayment_amount,2)." <br>";
            $message .= "<b>Installment Amount : </b> ".number_format($emi,2)." <br>";
            $message .= "<b>Repayment Period: </b> ".$repayment_period." <br>";

            $message .= "Log in to badili Sacco system and approve the above. Or click on the link below <br> ";
            $message .= " <a href ='https://portal.badilisacco.co.ke/loans/process_loan_applications.php'><button class='btn btn-success'>APPROVE</button></a><br><br>";
           
        }

        

        sendEmailMultiple($email_subject, $message, $email_to_array, $mail_configs);
        //END EMAIL SEC, CHAIR, TREASURER, VC, VSEC

        
        audit_trail($dbh, $audit_description, $logged_inuser);
        // echo '<script>alert("Client has been added.")</script>';
        //echo "update was successful";
    } else {
    }
}
?>