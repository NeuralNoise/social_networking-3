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