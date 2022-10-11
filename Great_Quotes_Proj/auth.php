<?php
session_start();

// Declare variables
$_registered = false;
$_matched = false;
$_banned = false;

// add parameters
function signin($email, $password){
	// add the body of the function based on the guidelines of signin.php
	global $_registered, $_matched, $_banned;
	// 4. check if the file containing banned users exists
	is_banned($email);
	// 6. check if the file containing users exists
	user_exists($email, $password);
	// 9. store session information
	if (($_registered == true && $_matched == true) && $_banned != true) {
		$cookie_name = 'user';
		$cookie_value = $email;

		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // Logged in for a month
		// 10. redirect the user to the members_page.php page
		// index.php
		is_logged();
	}
}

// add parameters
function signup($email, $password){
	// add the body of the function based on the guidelines of signup.php
	global $_registered, $_matched, $_banned;
	// check if the file containing banned users exists
	// check if the email has not been banned
	is_banned($email);
	// check if the file containing users exists
	// check if the email is in the database already
	user_exists($email, $password);
	if (($_registered == false && $_matched == false) && $_banned != true) {
		// encrypt password
		$encrypted_password = password_hash($password, PASSWORD_BCRYPT);
		// save the user in the database 
		$handle = fopen('data\banned.csv', 'a+'); // open the file
		fputs($handle, $email . ";" . $encrypted_password . PHP_EOL);
		fclose($handle);
		// show them a success message and redirect them to the sign in page
		die("Success!");
		header("Location: signin.php", TRUE, 302);
		die();
	}
}

function signout(){
	// add the body of the function based on the guidelines of signout.php
	if ($_SESSION['logged']=true) {
		$_SESSION['logged']=false;
		session_destroy();
		// redirect the user to the public page.
		header("Location: public.php", TRUE, 302);
		die();
	}
}

function is_logged(){
	// check if the user is logged
	//return true|false
	if(isset($_COOKIE['user'])) {
		$_SESSION['logged']=true;

		// index.php
		header("Location: index.php", TRUE, 302);
		die();
	} else {
		$_SESSION['logged']=false;
	}
}

function is_banned($email) {
	// check if the file containing banned users exists
	global $_banned;

	if (file_exists('data\banned.csv') and is_file('data\banned.csv')) {
		$handle = fopen('data\banned.csv', 'r'); // open the file
		// 5. check if the email has been banned
		while (($row = fgetcsv($handle)) !== false) {
			$user = explode(';', $row); // explode the csv row

			if ($email == $user[0]) {
				$_banned = true; // return that the user has been banned
			}
        }
		fclose($handle); // close the file
	}
}

function user_exists($email, $password) {
	global $_registered, $_matched;

	if (file_exists('data\users.csv') and is_file('data\users.csv')) {
		$handle = fopen('data\users.csv', 'r'); // open the file
		// 7. check if the email is registered
		while (($row = fgetcsv($handle)) !== false) {
			$user = explode(';', $row); // explode the csv row

			if ($email == $user[0]) {
				$_registered = true; // return that the user exists already
			}
			// 8. check if the password is correct
			if (password_verify($password,$user[1])) {
				$_matched = true; // return matched passwords
			} else {
				die('Password does not match!');
			}
        }
		fclose($handle); // close the file

	}
}