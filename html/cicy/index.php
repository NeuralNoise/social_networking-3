<?php
  require_once('sn_functions.php');
  //start session
  session_start();
  do_html_header('Login');
  do_html_login();
  // do_html_sidebar('home');
  // do_html_home_page('','','','');
  do_html_footer();
?>


