<?php
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    echo 'Welcome ' . $_SESSION['user_name'];
    echo 'Your cart: ' . $_SESSION['products'][0];
} else {
    echo 'Go away!';
}