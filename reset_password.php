<?php
	require_once('functions_all.php');
	// start session
	session_start();

  	// disable message after reset
  	$succes	= false;

	// get key for GET
	if($_GET['key']){
		$_SESSION['key'] = 	$_GET['key'];
	}

  	if( isset($_POST['submit']) ){

  		$pwd 		= $_POST['pwd'];
		$pwd2		= $_POST['pwd2'];
		$key 		= $_SESSION['key'];
	  	$errPwd		= '';
	  	$errPwd2 	= '';
	  	$result		= '';


		//wrong password lenght
		if(!correct_password($pwd))
		{
		  	$errPwd = 'Length should be between 9-20 characters.';
		}
		
		//passwords match
		if(!the_same_passwords($pwd, $pwd2))
		{
			$errPwd2 = 'Passwords don\'t match.';
		}

		if (!$errPwd && !$errPwd2 && isset($_SESSION['key'])) {
			// check key and reset password in db
			if(reset_password($key, $pwd)){
				$result='<div class="alert alert-success">Password was reset successfuly.</div>';
				$_SESSION['key'] = '';
				$success = true;
			}
			else
				$result='<div class="alert alert-danger">Error! Password cannot be reset.</div>';
		}

  	}

	do_html_header('Reset password',true, true, false);
	do_html_reset_password($errPwd, $errPwd2, $result, $success);
	do_html_footer();

?>