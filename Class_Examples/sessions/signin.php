<?php
session_start();

$_SESSION['logged'] = true;
$_SESSION['user_name'] = 'John Lennon';
$_SESSION['products'] = [];
?>

You are now signed in