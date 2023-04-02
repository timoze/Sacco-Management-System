<?php 

 

/*$servername = "fdb30.awardspace.net";

$username 	= "4219484_badilisacco";

$password 	= "g_h,Y,cp6Mg(eZb}";

$database = "4219484_badilisacco";*/

/*$env = file('../.env');



foreach ($env as $line) {

    list($key, $value) = explode('=', $line);

    $config[$key] = $value;

}

//print_r($config);

$servername = strval($config['DATABASE_HOST']);

$username 	= strval($config['DATABASE_USERNAME']);

$password 	= strval($config['DATABASE_PASSWORD']);

$dbname 	= strval($config['DATABASE_NAME']);

print $servername;



//$conn = new mysqli($servername, 'root', '', $dbname);

$conn = new mysqli($servername, $username, $password, $dbname);

*/

$servername = "116.202.169.44";

$username 	= "gmekdpli_badilisacco";

$password 	= "yp!iY,D*vfw%";



	

//$conn = new mysqli($servername, $username, $password);



/*$company_name 	= "Badili Sacco";

//$database 		= $fb['db_name'];

$company_code 	= "Badili";

*/
/*
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



$fb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id, company_name, db_name, company_code FROM badili_sacco_branches.branchdata WHERE company_port = '$branch_code' AND agent_status='1'"));

$agent_id 		= $fb['id'];

$company_name 	= $fb['company_name'];

$database 		= $fb['db_name'];

$company_code 	= $fb['company_code'];
*/
$company_name 	= "Badili Sacco";

$database 		= 'gmekdpli_badilisacco';

$company_code 	= "Badili";



define('DB_HOST',$servername);

define('DB_USER',$username);

define('DB_PASS',$password);

define('DB_NAME',$database);

/*

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

*/



?>