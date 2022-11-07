<?php
session_start();
// This class should contain methods for signing up, in, and out a user. 
// Also, it contains methods for checking if the user is logged in and for retrieving information about the authenticated user.
class AuthHelper
{
    // SIGNUP
    static function sign_up($username, $password)
    {   // save the user in the database 
        $handle = fopen('../users.csv', 'a+'); // open the file
        fputs($handle, $username . ";" . $password . PHP_EOL);
        fclose($handle);

        return true;
    }
    // SIGNIN
    static function sign_in($username, $password)
    {
        if (file_exists('../users.csv') and is_file('../users.csv')) {
            $handle = fopen('../users.csv', 'r'); // open the file
            // 7. check if the email is registered
            while (($row = fgetcsv($handle)) !== false) {
                $string = implode('', $row);
                $user = explode(';', $string); // explode the csv row

                if ($username == $user[0]) { // find the correct user
                    if ($password == $user[1]) { // match the password
                        $cookie_name = 'user';
                        $cookie_value = $username;

                        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // Logged in for a month
                    }
                }
            }
            fclose($handle); // close the file

            //SET SESSION LOG
            if (isset($_COOKIE['user'])) {
                $_SESSION['logged'] = true;
                return true;
            } else {
                $_SESSION['logged'] = false;
                return false;
            }
        }
    }
    // SIGNOUT
    static function sign_out()
    {
        // add the body of the function based on the guidelines of signout.php
        if ($_SESSION['logged'] = true) {
            $_SESSION['logged'] = false;
            session_destroy();
            return true;
        }
    }
    // LOGGED IN
    static function logged_in()
    {
        //return true|false
        if (isset($_COOKIE['user'])) {
            $_SESSION['logged'] = true;
            return true;
        } else {
            $_SESSION['logged'] = false;
            return false;
        }
    }
    // USER INFO
    static function user_info($username)
    {
        if (file_exists('../users.csv') and is_file('../users.csv')) {
            $handle = fopen('../users.csv', 'r'); // open the file
            // 7. check if the email is registered
            while (($row = fgetcsv($handle)) !== false) {
                $string = implode('', $row);
                $user = explode(';', $string); // explode the csv row

                if ($username == $user[0]) { // find the correct user
                    return $user; // pass user info
                }
            }
            fclose($handle); // close the file

        }
    }
}