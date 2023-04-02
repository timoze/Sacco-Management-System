<?php 

error_reporting(0);

ini_set('max_execution_time', 180);

date_default_timezone_set("Africa/Nairobi");

//include('auth.php');

$servername = "localhost";
$username 	= "root";
$password 	= "";
$database 		= 'badili_sacco';

$company_name 	= "Badili Sacco";
$company_code 	= "Badili";



define('DB_HOST',$servername);

define('DB_USER',$username);

define('DB_PASS',$password);

define('DB_NAME',$database);


// Establish database connection.

try

{

	$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

}

catch (PDOException $e)

{

	exit("Error: " . $e->getMessage());

}



$connection = new mysqli($servername, $username, $password , $database);

if ($connection->connect_error) {

	die("Connection failed: " . $connection->connect_error);

}else{

	//echo "successfully";

}

?>