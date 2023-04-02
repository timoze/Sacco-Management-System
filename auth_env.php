<?php
$env = file('.env');

foreach ($env as $line) {
    list($key, $value) = explode('=', $line);
    $config[$key] = $value;
}
//print_r($config);
$servername = ($config['DATABASE_HOST']);
$username 	= ($config['DATABASE_USERNAME']);
$password 	= ($config['DATABASE_PASSWORD']);
$dbname 	= ($config['DATABASE_NAME']);
print $servername;

$conn = new mysqli($servername, $username, $password, $dbname);
//$conn = new mysqli($servername, $username, $password);
/*
$servername = "localhost";
$username 	= "root";
$password 	= "";

	
$conn = new mysqli($servername, $username, $password);
*/
/*$company_name 	= "Badili Sacco";
//$database 		= $fb['db_name'];
$company_code 	= "Badili";
*/
$branch_url = $_SERVER['HTTP_HOST'];
$exp=explode(":", $branch_url);

if (isset($exp[1])) {
	$branch_code = $exp[1];
}else{
	$branch_code = "80";
}

$branch_url = $_SERVER['HTTP_HOST'];
$exp=explode(":", $branch_url);

if (isset($exp[1])) {
	$branch_code = $exp[1];
}else{
	$branch_code = "80";
}

$fb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id, company_name, db_name, company_code FROM branchdata WHERE company_port = '$branch_code' AND agent_status='1'"));
$agent_id 		= $fb['id'];
$company_name 	= $fb['company_name'];
$database 		= $fb['db_name'];
$company_code 	= $fb['company_code'];

define('DB_HOST',$servername);
define('DB_USER',$username);
define('DB_PASS',$password);
define('DB_NAME',$database);
