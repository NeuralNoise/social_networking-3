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
        echo 'adding comment to db';
        add_comment($id_user_current, $id_post, $comment);
      }
      else{
         echo '<script type="text/javascript">    setTimeout(function() { emptyComment(); }, 500);      </script>';
      }

    }

  	do_html_header('Home',false,false,true);
    do_html_posts($id_user_current, $result);
  }
  else
  {
   do_html_header('Home',true,true,false); 
   echo 'please login to see your posts';	
  }

  do_html_footer();
?>
