<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
      /*  $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 2;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'mail.badilisacco.co.ke;';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'notifications@badilisacco.co.ke';                 
            $mail->Password   = 'HSS3~GvdUP#X';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 465;  
            $mail->setFrom('notifications@badilisacco.co.ke', 'Notifications');           
          //  $mail->addAddress('receiver1@gfg.com');
            $mail->addAddress('timothy.arusei@gmail.com', 'Timothy');
            $mail->isHTML(true);                                  
            $mail->Subject = 'Subject';
            $mail->Body    = 'HTML message body in <b>bold</b> ';
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
            echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $errmsg = $mail->ErrorInfo;
        }


        
*/
$mail = new PHPMailer();
// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "mail.badilisacco.co.ke";    // SMTP server example
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "notifications@badilisacco.co.ke";            // SMTP account username example
$mail->Password   = "HSS3~GvdUP#X";            // SMTP account password example

$mail->addAddress('timothy.arusei@gmail.com', 'Timothy');
// Content
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
        ?>