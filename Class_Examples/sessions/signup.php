<?php
// SIGNUP
if (count($_POST) > 0) {
    $fh = fopen('users.csv');
    fputs($fh, $_POST['email'] . ";" . $_POST['password'] . PHP_EOL);
    fclose($fh);
    die('You have created an account successfully');
}
?>

<form method="POST">
    <input type='email' name='email' />
    <input type='password' name='password' />
    <button type='submit'>Create Account</button>
</form>