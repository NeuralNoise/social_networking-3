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