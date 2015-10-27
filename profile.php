<?php
  	require_once('functions_all.php');
  	//start session
  	session_start();

  	if(isset($_SESSION['user_id'])){
  		$user_id	= $_SESSION['user_id'];

	  	do_html_header('Profile', false, false, $_SESSION['username'], true);
	  	do_html_profile($user_id);
	  	do_html_footer();
  	}
  	else
  	{
  		do_html_header('Profile', true, true, '', false);
	    do_html_intro();
	    do_html_footer();
  	}

?>
