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
		  			// send email to user
		  			// $to = $Email;
			    //     $subject = "Password Reset";
			    //     $message = "To reset your password, please <a href='http://localhost/reset_password?key='.$key.'>Click here</a><br /><br />Do LIFE,<br /> The Team";
			    //     $from = "CysticLife <noreply@cysticlife.org>";
			    //     $headers  = 'MIME-Version: 1.0' . "\n";
			    //     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
			    //     $headers .= "From: $from";
			    //     if(mail($to, $subject, $message, $headers));{
			    //         $success = "true";
			    //     }


		  			$admin_email 	= "mike.gamer.best@gmail.com";
		  			$subject		= "Reset Password";
		  			$em 			= "mike.gamer.best@gmail.com";
		  			$comment		= "Plese use link below to reset your password.  http://localhost/reset_password?key=" .$key. "";

		  			if(mail($admin_email, $subject, $comment, $em))
		  				$result='<div class="alert alert-success">An email has been sent to '.$email.' with further instructions</div>';
		  			else
		  				$result='<div class="alert alert-danger">Email was not sent</div>';
		  			// mail($admin_email, $subject, $comment, $em);
		  			// $result='<div class="alert alert-success">An email has been sent to '.$email.' with further instructions</div>';
		  		}
		  		else
		  			$result='<div class="alert alert-success">Database error! Please contact your wesite addministrator for more details.</div>';
		  	}
			else
			{
				$result='<div class="alert alert-danger">No account with that email address exists.</div>';
			}
		}

  	}

	do_html_header('Forgotten password',true, true, false);
	do_html_forgotten_password($errEmail, $result);
	do_html_footer();

?>