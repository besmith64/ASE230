<?php
session_start(); // always start the session first before anything else

print_r(($_SESSION));

$_SESSION['age'] = '29';
?>

<a href="pagea.php">Link to Page a</a>