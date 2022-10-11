<?php
session_start();
//Add functions
include('auth.php');
// if the user is not logged in, redirect them to the public page
if(!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
	header("Location: index.php", TRUE, 302);
	die();
}

signout();