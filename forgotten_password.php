<?php
	require_once('functions_all.php');

  	if( isset($_POST['submit']) ){

	  	$email 		= $_POST['email'];
	  	$errEmail	= '';
	  	$result		= '';

		//wrong email
		if(!correct_email($email))
		{
			$errEmail = 'Incorrect email address.';
		}

		if (!$errEmail) {

		  	// check email address
		  	if(check_email($email)){
		  		// create key for reseting password and add it to db
		  		$key = md5($email.time);
		  		// add key to db
		  		if(add_key($email, $key)){
		  			// send email with generated key  
		  			$theme			= "Social Networking - password resetting!";
		  			$content		= "Plese use link below to reset your password.\n"
		  							  ."http://localhost/reset_password?key=" .$key. "";

		  			if(mail($email, $theme, $content))
		  				$result='<div class="alert alert-success">An email has been sent to '.$email.' with further instructions</div>';
		  			else
		  				$result='<div class="alert alert-danger">Email was not sent</div>';

		  		}
		  		else
		  			$result='<div class="alert alert-success">Database error! Please contact your wesite addministrator for more details.</div>';
		  	}
			else
			{
				$result='<div class="alert alert-danger">There is no account with provided email address.</div>';
			}
		}

  	}

	do_html_header('Forgotten password',true, true, '', false);
	do_html_forgotten_password($errEmail, $result);
	do_html_footer();

?>