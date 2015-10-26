<?php
	require_once('functions_all.php');

	do_html_header('Registration complete', true, false, false);
  	do_html_sign_up_complete($_GET['name']);
  	do_html_footer();
?>