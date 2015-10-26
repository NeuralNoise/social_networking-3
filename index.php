<?php
  require_once('functions_all.php');
  //start session
  session_start();

  if($_SESSION['user_id']){

    $id   = $_SESSION['user_id'];
    $post = '';

    if( isset($_POST['submit']) ){

      // remove white spaces
      $post    = trim($_POST['post']);

      $result = $errPost = '';

      // wrong post
      if(!correct_post($post)){
        $errPost = 'Post cannot be empty';
      }

      if(!$errPost){
        // add new post to db
        add_post($id, $post);
        $result='<div class="alert alert-success">New post was added.</div>';
      }
      else
      {
        $result='<div class="alert alert-danger">Post cannot be empty</div>';
      }
    }

  	do_html_header('Home',false,false,true);
    do_html_posts($id, $result);
  }
  else
  {
   do_html_header('Home',true,true,false); 
   echo 'please login to see your posts';	
  }

  do_html_footer();
?>
