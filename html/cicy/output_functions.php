<?php

  function do_html_header($title)
  {
  //print an HTML header
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- Custom styles for this project -->
  <link href="css/sticky-footer.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Social Networking</a>
    </div>
    <div>
<!--       <ul class="nav navbar-nav navbar-center">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href"#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul> -->
      <ul class="nav navbar-nav navbar-right">
<?php
  if($title == "Login"){
?>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
<?php   
  }
  if($title == "Register"){
?>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
<?php
  }
?>

      </ul>
    </div>
  </div>
</nav>
<?php
  }
  //end of function "do_html_header()"/////////////////////////////////////

  function do_html_login()
  {
  // function creates login form
?>

<div class="container">
  <h2>Vertical (basic) Form</h2>
  <form role="form">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<?php
  }

  function do_html_footer()
  {
  // function closes html code
?>

<footer class="footer navbar">
      <div class="container center-block">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>

</body>
</html>

<?php
  }
  //end of function "do_html_footer"///////////////////////////////////////
?>