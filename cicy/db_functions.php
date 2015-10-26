<?php
	// function checks database connection
	function connect_db()
	{
		try 
		{
		    $db = new PDO('mysql:host=localhost;dbname=social_networking;charset=utf8', 'cicy', 'cicy');
		} catch(PDOException $ex) 
		{
		    echo "Cannot establish connection to database!!!"; 
		}
	}
?>