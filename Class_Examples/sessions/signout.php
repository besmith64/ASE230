<?php
session_start();
unset($_SESSION['logged']);

session_destroy();
?>

<h1>You are signed out!</h1>