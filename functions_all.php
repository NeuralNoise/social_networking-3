
<?php

  function do_html_header($title, $login, $signup, $username, $logout)
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
  <!-- validation script - comments -->
  <script type="text/javascript">
    function emptyComment(){
      alert("Comment cannot be empty");
    }
  </script>
  <!-- Custom styles for this project -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Social Networking</a>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-left">
<?php
  switch ($title) {
    case 'Home':
?>
      <li class="active"><a href="#">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
<?php
      break;
    case 'Profile':
?>
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="#">Profile</a></li>
<?php
      break;
    default:
?>
      <li><a href="index.php">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
<?php
      break;
  }
?> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
<?php
  if($login){
?>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
<?php
  }
  if($signup){
?>
        <li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
<?php   
  }
  if($logout){
?>
        <p class="navbar-text" style="margin-left: 15px;"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?></p>
        <!-- <li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?></a></li> -->
        <li><a href="login.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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

     function do_html_intro(){
    // fucntion allow adding new posts
?>
  <div class="container bg-img">
    <h1>Welcome to Social Networking</h1>
    <p>Please login in order to use this service!</p>
  </div>

<?php 
  }
    // end of do_html_posts

  function do_html_login($result)
  {
  // function creates login form
?>

<div class="container bg-img">
  <h2>Login</h2>
  <form role="form" action="login.php" method="post">
    <div class="form-group">
      <label for="login">User name:</label>
      <input type="text" class="form-control" id="login" name="login" placeholder="Enter user name">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
    </div>
    <div class="form-group">
      <?php echo $result; ?> 
    </div>
    <button id="submit" name="submit" type="submit" class="btn btn-default">Submit</button>
    <a href="forgotten_password.php">Forgotten your password?</a>
  </form>
</div>

<?php
  }
  // end of function "do_html_login()"//////////////////////////////////////

  function do_html_sign_up($errLogin, $errName, $errSurname, $errAge, $errPhone, $errEmail, $errPwd, $errPwd2, $result, $login, $name, $surname, $age, $phone, $email)
  {
  // function creates signing in form
?>

<div class="container">
  <h2>Sign up</h2>
  <form role="form" action="sign_up.php" method="post">
    <div class="form-group">
      <label for="login">User Name:</label>
      <input type="text" class="form-control" id="login" name="login" placeholder="Enter your user name (more than 8 letters)" value="<?php echo $login; ?>">
      <?php echo "<p class='text-danger'>$errLogin</p>";?>
    </div>
    <div class="form-group">
      <label for="name">First Name:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter your first name" value="<?php echo $name; ?>">
      <?php echo "<p class='text-danger'>$errName</p>";?>
    </div>
    <div class="form-group">
      <label for="surname">Surname:</label>
      <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter your surname" value="<?php echo $surname; ?>">
      <?php echo "<p class='text-danger'>$errSurname</p>";?>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="text" class="form-control" id="age" name="age" placeholder="Enter age (1 - 120)" value="<?php echo $age; ?>">
      <?php echo "<p class='text-danger'>$errAge</p>";?>
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="<?php echo $phone; ?>">
      <?php echo "<p class='text-danger'>$errPhone</p>";?>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $email; ?>">
      <?php echo "<p class='text-danger'>$errEmail</p>";?>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password (more than 8 symbols)">
      <?php echo "<p class='text-danger'>$errPwd</p>";?>
    </div>
    <div class="form-group">
      <label for="pwd2">Retype Password:</label>
      <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Retype password">
      <?php echo "<p class='text-danger'>$errPwd2</p>";?>
    </div>
    <div class="form-group">
      <?php echo $result; ?> 
    </div>
    <button id="submit" name="submit" type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<?php
  }
  // end of function "do_html_sign_ in()"//////////////////////////////////////

  function do_html_sign_up_complete($name)
  {
    //displays congratulation message for the new teacher
?>

  <div class="container">
    <h2>Registration complete!!!</h2>
    <div id="subContent">
    <p>Welcome <?php echo ' '.$name ?>, </br>
      please sign in using <span class="glyphicon glyphicon-log-in"></span> Login button.</p>  
  </div>

<?php
  }
  //end of register complete////////////////////////////////////////////

  function do_html_profile($id)
  {    
    // get user details from db
    $details  = user_details($id);
?>
  <div class="container bg-img">
    <h2>User profile</h2>


    <div class="panel panel-default">

      <div class="panel-body">
        <div class="row">
          <div class="col-sm-4"><em>User name</em></div>
          <div class="col-sm-8"><?php echo $details["username"]; ?></div>
        </div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-sm-4"><em>Name</em></div>
          <div class="col-sm-8"><?php echo $details["name"]; ?></div>
        </div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-sm-4"><em>Surname</em></div>
          <div class="col-sm-8"><?php echo $details["surname"]; ?></div>
        </div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-sm-4"><em>Age</em></div>
          <div class="col-sm-8"><?php echo $details["age"]; ?></div>
        </div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-sm-4"><em>Phone</em></div>
          <div class="col-sm-8"><?php echo $details["tel"]; ?></div>
        </div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-sm-4"><em>Email</em></div>
          <div class="col-sm-8"><?php echo $details["email"]; ?></div>
        </div>
      </div>

    </div>

  </div>

<?php
  }
  // end of user profile

    function do_html_forgotten_password($errEmail, $result){
?>
  <div class="container">
    <h2>Forgotten your password?</h2>
    <p>Enter your email address to reset your password. You may need to check your spam folder.</p>
    <form role="form" action="forgotten_password.php" method="post">
      <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address here">
        <?php echo "<p class='text-danger'>$errEmail</p>";?>
      </div>
      <div class="form-group">
        <?php echo $result; ?> 
      </div>
      <button id="submit" name="submit" type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
<?php 
  }
    // end of forgotten password
    function do_html_reset_password($errPwd, $errPwd2, $result, $success){
?>
  <div class="container">
    <h2>Reset password</h2>
<?php 
if(!$success){
?>

    <p>Please enter your new password.</p>
    <form role="form" action="reset_password.php" method="post">
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password (more than 8 symbols)"  >
        <?php echo "<p class='text-danger'>$errPwd</p>";?>
      </div>
      <div class="form-group">
        <label for="pwd2">Retype Password:</label>
        <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Retype password" >
        <?php echo "<p class='text-danger'>$errPwd2</p>";?>
      </div>
      <div class="form-group">
        <?php echo $result; ?> 
      </div>
      <button id="submit" name="submit" type="submit" class="btn btn-default">Submit</button>
    </form>
<?php
} else
{
?>
      <div class="form-group">
        <?php echo $result; ?> 
      </div>
<?php
}
?>
  </div>
}
<?php 
  }
    // end of reset password

   function do_html_posts($id_user, $result){
    // fucntion allow adding new posts
?>
  <div class="container">
    <h2>Add post</h2>
    <form role="form" action="index.php" method="post">
      <div class="form-group">
        <textarea type="text" class="form-control" rows="5" id="post" name="post" placeholder="Enter your new post here"></textarea>
      </div>
      <div class="form-group">
        <?php echo $result; ?> 
      </div>
      <button id="submit" name="submit" type="submit" class="btn btn-default">Add</button>
    </form>
  </div>

<?php 
      do_html_published_posts($id_user);
  }
    // end of do_html_posts

  function do_html_published_posts($id_user_current)
  {
  // function displays all posts
?>

  <div class="container">
    <h2>Published posts</h2>
    <div class="panel-group">
<?php 

      // used in order to load a section position on the page 
      $counter      = 1;

      // get all posts from db
      $posts = get_posts();
      if(count($posts) == 0)
        echo '<p>No posts yet!</p>';

      foreach($posts as $line){
        // different heading color for current and other users
        $panel_type = 'info';

        // split array into variables
        $username     = $line["username"];
        $content      = $line["content"];
        $id_user_post = $line["id_user"];
        $id_post      = $line["id_post"];

        // change heading color if post belongs to current user
        if($id_user_post == $id_user_current)
          $panel_type = 'success';

        // get number of post likes
        $nb_like_post = get_like_post($id_post);

        // check if already liked
        $is_liked_post = is_liked_post($id_user_current, $id_post);
?>
      <div id="section-<?php echo $counter; ?>" class="panel panel-<?php echo $panel_type; ?>">
        
        <div class="panel-heading">
          <div class="row">
            <div class="col-sm-2"><b><?php echo $username; ?>:</b></div>
            <div class="col-sm-10"><?php echo $content; ?></div>
          </div>
        </div>

        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div>
              <ul class="nav navbar-nav navbar-right">
<?php
        if($is_liked_post)
        {
?>
                <p class="navbar-text"><span class="glyphicon glyphicon-thumbs-up blue" style="margin-left: 15px;"></span><span class="blue"> Liked</span></p>
<?php          
        }else
        {
?>
                <li><a href="?id_user=<?php echo $id_user_current; ?>&id_post=<?php echo $id_post; ?>#section-<?php echo $counter; ?>"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>
<?php
        }
?>
                
                <p class="navbar-text" style="margin-left: 15px;">Likes: <?php echo $nb_like_post; ?></p>
              </ul>
            </div>
          </div>
        </nav>

        <div class="panel-body">
          <h7><em>Comments:</em></h7>

<?php
        // get all comments for individual post from db
        $comments = get_comments($id_post);

        if(count($comments) == 0)
          echo '<p>No comments yet!</p>';
        foreach ($comments as $line2) {
        
        // split array into variables
        $username = $line2["username"];
        $comment  = $line2["content"];

?>

          <div class="row">
            <div class="col-sm-2"><b><?php echo $username; ?>:</b></div>
            <div class="col-sm-10"><?php echo $comment; ?></div>
          </div>

<?php
        }

?>
          &nbsp;
          <form role="form" action="index.php#section-<?php echo $counter; ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="comment<?php echo $counter; ?>" name="comment" placeholder="Enter your comment here">
            </div>
            <input type="hidden" id="id_user_comment" name="id_post" value="<?php echo $id_post; ?>" /> 
            <button id="submit_comment" name="submit_comment" type="submit" class="btn btn-default">Add comment</button>
          </form>    
        </div><!-- panel-body -->
      </div><!-- panel panel-info/panel-success -->
<?php
      $counter++;
      }

?>
    </div>
  </div>

<?php

  }
  //end of function "do_html_footer"///////////////////////////////////////

  function do_html_footer()
  {
  // function closes html code
?>

  <footer class="footer navbar navbar-fixed-bottom">
    <div class="container">
      <p class="text-muted">Website Development - Cecilia Chipendo</p>
    </div>
  </footer>
</body>
</html>

<?php
  }
  //end of function "do_html_footer"///////////////////////////////////////
?>

<?php
	//set of function used for the validation 
	
	// login string in range 9-19
	function correct_login($login)
	{
		if(strlen($login) < 9 || strlen($login) > 20 )
		{
			return false;
		}
		else
		{
			return true;
		}
	}


	// alphabetic charecters in range 6-15
	function correct_name($name)
	{
		if(ctype_alpha($name) && strlen($name) > 5 && strlen($name))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//login not empty
	function correct_age($age)
	{
		if(is_numeric($age) && $age > 0 && $age < 121)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//correct password
	function correct_password($pwd)
	{
		if(strlen($pwd) < 9 || strlen($pwd) > 20)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	//the same password
	function the_same_passwords($pwd, $pwd2)
	{
		if($pwd == $pwd2)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//correct email
	function correct_email($email)
	{
		if (preg_match('|^[_a-z0-9.-]*[a-z0-9]@[_a-z0-9.-]*[a-z0-9].[a-z]{2,3}$|e', $email)) 
		{
	      return true;
	    } 
		else 
		{
	      return false;
	    }
	}
	
	//correct phone number
	function correct_phone($phone)
	{
		if(preg_match ( '|^[0-9]{6,20}$|e' , $phone ))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function correct_post($post){
		if(strlen($post) > 0){
			return true;
		}
		else{
			return false;
		}
	}
?>

<?php

	function add_user_to_db($username, $name, $surname, $age, $tel, $email, $password){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
		// check if login or email already exists
		$stmt = $db->prepare("SELECT * FROM users_table WHERE username=? OR email=?");
		$stmt->bindValue(1, $username, PDO::PARAM_STR);
		$stmt->bindValue(2, $email, PDO::PARAM_STR);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(count($rows) > 0)
		{
			return false;
		}
		// if not add to db
		else
		{
			$sql = "INSERT INTO users_table (username, name, surname, age, tel, email, password) VALUES (?, ?, ?, ?, ?, ?, ?);";
			$sth = $db->prepare($sql);
			$sth->bindParam(1, $username, PDO::PARAM_STR);
			$sth->bindParam(2, $name, PDO::PARAM_STR);
			$sth->bindParam(3, $surname, PDO::PARAM_STR);
			$sth->bindParam(4, $age, PDO::PARAM_STR);
			$sth->bindParam(5, $tel, PDO::PARAM_STR);
			$sth->bindParam(6, $email, PDO::PARAM_STR);
			$sth->bindParam(7, $password, PDO::PARAM_STR);
			$sth->execute();
			return true;
		}

	}

	function login_user($username, $pwd){
		// connect to db	
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
		// check if login or email already exists
		$stmt = $db->prepare("SELECT * FROM users_table WHERE username=? AND password=?");
		$stmt->bindValue(1, $username, PDO::PARAM_STR);
		$stmt->bindValue(2, $pwd, PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// if exists retun user id
		if(count($row) > 0)
		{
			return $row["id_user"];
		}
		else
			return '';
	}

	function user_details($id_user){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}

		$stmt = $db->prepare("SELECT * FROM users_table WHERE id_user=? ");
		$stmt->bindValue(1, $id_user, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// return results
		return $row;
	}

	function check_email($email){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
		// check if email exists
		$stmt = $db->prepare("SELECT * FROM users_table WHERE email=?");
		$stmt->bindValue(1, $email, PDO::PARAM_STR);
		$stmt->execute();
		$row_count = $stmt->rowCount();
		// if exists return user id
		if($row_count > 0)
		{
			return true;
		}
		else
			return false;
	}

	function add_key($email, $key){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}

		$sql = "INSERT INTO keys_table (email, token) VALUES (?, ?);";
		$sth = $db->prepare($sql);
		$sth->bindParam(1, $email, PDO::PARAM_STR);
		$sth->bindParam(2, $key, PDO::PARAM_STR);
		$sth->execute();
		return true;
	}

	function reset_password($key, $password){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} 
		catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
		// get user email
		$stmt = $db->prepare("SELECT * FROM keys_table WHERE token=?");
		$stmt->bindValue(1, $key, PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// reset password
		if(count($row) > 0)
		{
			$email = $row["email"];
			$stmt = $db->prepare("UPDATE users_table SET password=? WHERE email=?");
			$stmt->bindValue(1, $password, PDO::PARAM_STR);
			$stmt->bindValue(2, $email, PDO::PARAM_STR);
			$stmt->execute();
			return true;
		}
		else{
			//echo "\ninside else db", $key;
			return false;
		}
	}

	function add_post($id_user, $content){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} 
		catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}

		$sql = "INSERT INTO post (content) VALUES (?);";
		$sth = $db->prepare($sql);
		$sth->bindParam(1, $content, PDO::PARAM_STR);
		$sth->execute();

		$lastId = $db->lastInsertId('id_user');
		$sql = "INSERT INTO posts (id_user, id_post) VALUES (?, ?);";
		$sth = $db->prepare($sql);
		$sth->bindParam(1, $id_user, PDO::PARAM_INT);
		$sth->bindParam(2, $lastId, PDO::PARAM_STR);
		$sth->execute();
		return true;
	}

		function get_posts(){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} 
		catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
		// get all posts
		$stmt = $db->prepare("SELECT * FROM view_posts_usr ORDER BY id_post DESC");
		$stmt->execute();
		$rows = $stmt->fetchAll();
		return $rows;

	}

	function add_comment($id_user_comment, $id_post, $comment){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} 
		catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}

		$sql = "INSERT INTO comment (id_comment_user, content) VALUES (?, ?);";
		$sth = $db->prepare($sql);
		$sth->bindParam(1, $id_user_comment, PDO::PARAM_INT);
		$sth->bindParam(2, $comment, PDO::PARAM_STR);
		$sth->execute();

		$lastId = $db->lastInsertId('id_comment');
		$sql = "INSERT INTO comments (id_comment, id_post) VALUES (?, ?);";
		$sth = $db->prepare($sql);
		$sth->bindParam(1, $lastId, PDO::PARAM_INT);
		$sth->bindParam(2, $id_post, PDO::PARAM_INT);
		$sth->execute();
		return true;
	}

		function get_comments($id_post){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} 
		catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
		// get all posts
		$stmt = $db->prepare("SELECT * FROM view_comments WHERE id_post=?");
		$stmt->bindValue(1, $id_post, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		return $rows;

	}

		function add_like_post($id_user, $id_post){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} 
		catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}

		$sql = "INSERT INTO likes_post (id_user, id_post) VALUES (?, ?);";
		$sth = $db->prepare($sql);
		$sth->bindParam(1, $id_user, PDO::PARAM_INT);
		$sth->bindParam(2, $id_post, PDO::PARAM_INT);
		$sth->execute();
	}


		function is_liked_post($id_user, $id_post){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} 
		catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
		// get all posts
		$stmt = $db->prepare("SELECT * FROM likes_post WHERE id_user=? AND id_post=?" );
		$stmt->bindValue(1, $id_user, PDO::PARAM_INT);
		$stmt->bindValue(2, $id_post, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		$nb_rows = count($rows);
		if($nb_rows == 0)
			return false;
		else
			return true;

	}


		function get_like_post($id_post){
		// connect to db
		try 
		{
			$host 	= 'localhost';
			$dbname = 'social_networking';
			$user 	= 'cicy';
			$pass 	= 'cicy';
		    $db = new PDO('mysql:host=' .$host. ';dbname=' .$dbname.';charset=utf8', $user, $pass);
		} 
		catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
		// get all posts
		$stmt = $db->prepare("SELECT * FROM likes_post WHERE id_post=?");
		$stmt->bindValue(1, $id_post, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		return count($rows);

	}

?>