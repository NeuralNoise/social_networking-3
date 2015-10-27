<?php
	require_once('functions_all.php');

	if(isset($_POST['submit'])){

		$login 		= $_POST['login'];
		$name		= $_POST['name'];
		$surname 	= $_POST['surname'];
		$age 		= $_POST['age'];
		$phone 		= $_POST['phone'];
		$email 		= $_POST['email'];
		$pwd 		= $_POST['pwd'];
		$pwd2		= $_POST['pwd2'];

		// reset errors
		$errLogin = $errName = $errSurname = $errAge = $errPhone = $errEmail = $errPwd = $errPwd2 = '';

		// wrong login
		if(!correct_login($login)){
			$errLogin = 'Login must be longer than 8 characters.';
		}

		// wrong name
		if(!correct_name($name)){
			$errName = 'Entered name is incorrect';
		}

		// wrong name
		if(!correct_name($surname)){
			$errSurname = 'Entered surname is incorrect';
		}

		// wrong age
		if(!correct_age($age)){
			$errAge = 'Age must be a number between 1-120';
		}

		// wrong phone number
		if(!correct_phone($phone))
		{
			$errPhone = 'Incorrect phone number.';
		}

		//wrong email
		if(!correct_email($email))
		{
			$errEmail = 'Incorrect email address.';
		}

		//wrong password lenght
		if(!correct_password($pwd))
		{
		  	$errPwd = 'Length should be between 9-20 characters.';
		}
		
		//passwords match
		if(!the_same_passwords($pwd, $pwd2))
		{
			$errPwd2 = 'Passwords don\'t match.';
		}

		if (!$errLogin && !$errName && !$errSurname && !$errAge && !$errPhone && !$errEmail && !$errPwd && !$errPwd2) {
			// check if login and/or email is not already registered then add to db
			if(add_user_to_db($login, $name, $surname, $age, $phone, $email, $pwd)){
				// redirect and pass name (Get)
				header('Location: /registration_complete.php?name='.$name);
				die();
			}
			else
			{
				$result='<div class="alert alert-danger">User name or email already in use!!!</div>';
			}
		} 
		else
		{
			
			$result='<div class="alert alert-danger">Sorry there are some incorrect inputs in your form!!!</div>';
		}
	}

	do_html_header('Sign up',true, false, '', false);
	do_html_sign_up($errLogin, $errName, $errSurname, $errAge, $errPhone, $errEmail, $errPwd, $errPwd2, $result, $login, $name, $surname, $age, $phone, $email);
	do_html_footer();

?>