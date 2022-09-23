<?php
    // a function for calculating the age of an individual
    function age($dob) {
        $birthdate = explode('/', $dob);
        // extract the string to a unix timestamp
        $t = mktime(0,0,0,$birthdate[0],$birthdate[1],$birthdate[2]);
        $age = floor((time() - $t) / 31556926); // Current time - DoB divided by seconds in a year rounded down

        echo $age;
    }
    // a function for calculating how many years, months, and days ago the person was born
    // function time($dob) {

    // }
    age('03/19/1993');