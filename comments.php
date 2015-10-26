<?php
  require_once('functions_all.php');
  //start session
  session_start();

  if($_SESSION['user_id']){
  	do_html_header('Comments',false,false,true);
    do_html_comments();

        if( isset($_POST['submit']) ){

          $comment    = $_POST['comment'];
          $pwd    = $_POST['pwd'];
          
          // get user id (if exists) from db
          $id = login_user($login, $pwd); 

        if($id){
          $_SESSION['user_id'] =  $id;
          // redirect and pass name (Get)
          header('Location: /profile.php?id='.$id);
          die();
        }
        else
        {
          $result='<div class="alert alert-danger">Incorrect user name or password!!!</div>';
        }

      }
  }
  else
  {
  	do_html_header('Comments',true,true,false);
  	echo 'please login to see comments';
  }

  // do_html_login();
  // do_html_sidebar('home');
  // do_html_home_page('','','','');
  do_html_footer();
?>
