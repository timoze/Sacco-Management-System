<?php
ob_start();
session_start();
function CheckSession()
{
	/*print $_SESSION['timeout'].'<br>';
	print time().'<br>';
	$idleTime= 60*1;
	//check to see if $_SESSION['timeout'] is set
	if(isset($_SESSION['timeout']))
	{
		$session_life = time() - $_SESSION['timeout'];
		if($session_life > $idleTime)
		{
			// your logout code here*
			return isset($_SESSION['member_id']);
		}
		else
		{
			destroy_usersession();
			return false;
		}
	}
	$_SESSION['timeout'] = time();*/
	if(time()<=$_SESSION['time'])
	{
		$_SESSION['time'] = (time() + 3000);
		return isset($_SESSION['member_id']);
	}
	else
	{
		destroy_usersession();
		return false;
	}
}
//log in the user by creating session variables
function CreateSession($member_id, $password)
{
	//$encrypt_result = $crypt->encrypt($key, $password, $pswdlen);
	$_SESSION['member_id'] = $member_id;
	$_SESSION['password'] = $password;
	$_SESSION['time'] = time() + (3000);
}
//log out user by destroying session variables
function DestroySession()
{
//	session_start();
	unset($_SESSION['member_id']);
	unset($_SESSION['password']);
	session_unset();     // unset $_SESSION variable for the run-time 
	session_destroy();   // destroy session data in storage
}
function destroy_usersession()
{
	unset($_SESSION['member_id']);
	unset($_SESSION['password']);
	session_unset();     // unset $_SESSION variable for the run-time 
	session_destroy();   // destroy session data in storage
}
?>