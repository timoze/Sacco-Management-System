<?php



include('../includes/dbconnection.php');

//COMPANY DETAILS
$company_details = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM company_details "));
$company_name           =   $company_details['company_name'];
$company_tel            =   $company_details['company_tel'];
$address                =   $company_details['address'];
$postal_code            =   $company_details['postal_code'];
$town                   =   $company_details['town'];
$physical_address       =   $company_details['physical_address'];
$company_pin            =   $company_details['company_pin'];
$registration_date      =   $company_details['registration_date'];
$compnay_email          =   $company_details['company_email'];



$config_items = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM config where id=1"));
$interest_rate      =   $config_items['interest_rate'];
$guarantors         =   $config_items['guarantors'];
$loan_formula       =   $config_items['loan_formula'];
$loan_grace_period  =   $config_items['loan_grace_period'];
$adjust_loan_period =   $config_items['adjust_loan_period'];
$company_logo       =   $config_items['company_logo'];
$mail_host          =   $config_items['mail_host'];
$mail_username      =   $config_items['mail_username'];
$mail_port          =   $config_items['mail_port'];
$mail_password      =   $config_items['mail_password'];

define("INTEREST_RATE",$interest_rate);
define("MAX_GUARANTORS",$guarantors);
define("LOAN_FORMULA",$loan_formula);
define("GRACE_PERIOD", $loan_grace_period);
define("LOGO",$company_logo);
define("ADJUST_LOAN_PERIOD",$adjust_loan_period);

define("MAIL_HOST",$mail_host);
define("MAIL_USERNAME",$mail_username);
define("MAIL_PORT",$mail_port);
define("MAIL_PASSWORD",$mail_password);

define("COMPANY_NAME",$company_name);
define("COMPANY_TELE",$company_tel);
define("COMPANY_ADDRESS",$address);
define("COMPANY_POSTALCODE", $postal_code);
define("COMPANY_TOWN",$town);
define("COMPANY_PHYSICAL_ADDRESS",$physical_address);
define("COMPANY_PIN", $company_pin);
define("COMPANY_EMAIL", $compnay_email);
?>

