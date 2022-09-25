<?php
// a function for calculating the age of an individual
function age($dob)
{
    $birthdate = explode('/', $dob);
    // extract the string to a unix timestamp
    $t = mktime(0, 0, 0, $birthdate[0], $birthdate[1], $birthdate[2]);
    $age = floor((time() - $t) / 31556926); // Current time - DoB divided by seconds in a year rounded down

    return $age;
}
// a function for calculating how many years, months, and days ago the person was born
function time_intervals($dob)
{
    $birthdate = new DateTime($dob); // Convert string to DateTime
    $now = new DateTime(); // Get current DateTime

    $diff = $birthdate->diff($now); // Get the difference between two dates

    $interval = array(
        'years' => ($diff->y), // Get Difference in Years
        'months' => (($diff->y) * 12) + ($diff->m), // Multiply years by 12 plus add the remainder
        'days' => ($diff->format("%a")) // Total number of days as a result of a diff()
    );

    return $interval;
}