<?php
session_start(); // always start the session first before anything else
// unset($_SESSION['logged']);
// $_SESSION['name'] = 'Benjamin';

// print_r(($_SESSION));

// session_destroy();

$_SESSION['products'][] = 'product a';
?>

<a href="pageb.php">Link to Page B</a>