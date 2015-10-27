<?php
	require_once('functions_all.php');
	// start session
	session_start();


	$logout 	= $_GET['logout'];
	if($logout){
		$_SESSION['user_id'] = '';
		$_SESSION['username'] = '';
		session_destroy();
	}

	if( ($_SESSION['user_id']) ){

		do_html_header('Login',false, false, $_SESSION['username'], true);
		echo 'You are already login';
		do_html_footer();
	} 
	else
	{
	  	if( isset($_POST['submit']) ){

		  	$login 		= $_POST['login'];
		  	$pwd 		= $_POST['pwd'];
		  	
		  	// get user id (if exists) from db
		  	$id	= login_user($login, $pwd);	

			if($id){
				// start session for id
				$_SESSION['user_id'] = 	$id;
				// get username from db and add to session
				$details  = user_details($id);
				$_SESSION['username'] = $details['username'];

				// redirect and pass user id using GET
				header('Location: /profile.php?id='.$id);
				die();
			}
			else
			{
				$result='<div class="alert alert-danger">Incorrect user name or password!!!</div>';
			}

	  	}

		do_html_header('Login',false, true, '', false);
		do_html_login($result);
		do_html_footer();
	}
?>


