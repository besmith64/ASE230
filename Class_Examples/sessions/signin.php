<?php
session_start();


if (count($_POST) > 0) {
    $fh=fopen('users.csv', 'r');
    while ($line = fgets($fh)) {
        $line=trim($line);
        $line=explode(';',$line);
        if($line[0]==$_POST['email']) {
            if($line[1]==$_POST['password']) {
                $_SESSION['logged'] = true;
                $_SESSION['user_name'] = $line[0];
                $_SESSION['products'] = [];       
             } else {
                die('incorrect password!');
             }
        } else {
            die('Not Today; you must create an account first!');
        }
    fclose($fh);
    
}
?>

<form method="POST">
    <input type='email' name='email' />
    <input type='password' name='password' />
    <button type='submit'>Sign In</button>
</form>