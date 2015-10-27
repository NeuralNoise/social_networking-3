<?php
  require_once('functions_all.php');
  //start session
  session_start();

  if($_SESSION['user_id']){

    $id_user_current   = $_SESSION['user_id'];
    $post = '';

    // adding post
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
        add_post($id_user_current, $post);
        $result='<div class="alert alert-success">New post was added.</div>';
      }
      else
      {
        $result='<div class="alert alert-danger">Post cannot be empty</div>';
      }
    }

    // adding comment
    if( isset($_POST['submit_comment']) ){

      // capture POSTs
      $id_post          = $_POST['id_post'];
      $comment          = trim($_POST['comment']);
      
      // wrong comment
      if(!correct_post($comment)){
        $errComment = 'Comment cannot be empty';
      }

      if(!$errComment){
        // add comment to db
        add_comment($id_user_current, $id_post, $comment);
      }
      else{
         // call javascript popups window
         echo '<script type="text/javascript">    setTimeout(function() { emptyComment(); }, 500);      </script>';
      }


    }

    // adding like to post
    if( isset($_GET['id_user']) && isset($_GET['id_post'])){
      // add like to db
      $id_user = $_GET['id_user'];
      $id_post = $_GET['id_post'];
      add_like_post($id_user, $id_post);
    }


  	do_html_header('Home',false,false, $_SESSION['username'], true);
    do_html_posts($id_user_current, $result);
  }
  else
  {
   do_html_header('Home',true,true, '', false); 
   do_html_intro();
  }

  do_html_footer();
?>
