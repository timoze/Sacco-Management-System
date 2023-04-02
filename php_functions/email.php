<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
//include('functions.php');
//Create an instance; passing `true` enables exceptions




function sendEmail($email_subject, $message, $email_to, $mail_configs ){
    
    $email_host     =   $mail_configs[0];
    $email_username =   $mail_configs[1];
    $email_port     =   $mail_configs[2];
    $email_ky       =   $mail_configs[3];
    $from_name      =   $mail_configs[4];
    $mail           =   new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $email_host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $email_username;                     //SMTP username
        $mail->Password   = $email_ky;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $email_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($email_username, $from_name);
        //$mail->addAddress('timothy.arusei@gmail.com', 'Timothy Arusei');     //Add a recipient
        $mail->addAddress($email_to);               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $email_subject;
        $message .= "<br><br><br><hr>
                        <p>This is a System Generated Email. Do not reply.</p>";
        $mail->Body    = $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
       // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    

}

function sendEmailMultiple($email_subject, $message, $email_to, $mail_configs ){
    
    $email_host     =   $mail_configs[0];
    $email_username =   $mail_configs[1];
    $email_port     =   $mail_configs[2];
    $email_ky       =   $mail_configs[3];
    $from_name      =   $mail_configs[4];
    $mail           =   new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $email_host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $email_username;                     //SMTP username
        $mail->Password   = $email_ky;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $email_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($email_username, $from_name);
        //$mail->addAddress('timothy.arusei@gmail.com', 'Timothy Arusei');     //Add a recipient
        foreach ($email_to as $emailto) {
            $mail->addAddress($emailto); 
        }
       // $mail->addAddress($email_to);               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $email_subject;
        $message .= "<br><br><br><hr>
                        <p>This is a System Generated Email. Do not reply.</p>";
        $mail->Body    = $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
       // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}



function sendBackupEmail($email_subject, $message, $email_to, $mail_configs, $attachments ){
    
    $email_host     =   $mail_configs[0];
    $email_username =   $mail_configs[1];
    $email_port     =   $mail_configs[2];
    $email_ky       =   $mail_configs[3];
    $from_name      =   $mail_configs[4];
    $mail           =   new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $email_host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $email_username;                     //SMTP username
        $mail->Password   = $email_ky;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $email_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($email_username, $from_name);
        //$mail->addAddress('timothy.arusei@gmail.com', 'Timothy Arusei');     //Add a recipient
       // $mail->addAddress($email_to);               //Name is optional
        foreach ($email_to as $emailto) {
            $mail->addAddress($emailto); 
        }
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        $mail->addAttachment($attachments);         //Add attachments
      //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $email_subject;
        $message .= "<br><br><br><hr>
                        <p>This is a System Generated Email. Do not reply.</p>";
        $mail->Body    = $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
       // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    

}


