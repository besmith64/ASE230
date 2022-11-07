<?php

require_once('../Classes/CSVHelper.php');

// READ
// echo '<pre>';
// print_r(CSVHelper::read('../test.csv')); // read a recordset from a CSV file

// WRITE
// CSVHelper::write('../test.csv', [['id' => 11, 'first_name' => 'John', 'last_name' => 'Lennon'], ['id' => 12, 'first_name' => 'Paul', 'last_name' => 'McCartney']]); // write a recordset to a JSON file

// MODIFY
CSVHelper::update('../test.csv', array(0 => 1, 1 => 'John', 2 => 'Lennon')); // modify the record in a CSV file

// DELETE
// CSVHelper::delete('../test.csv', 4); // delete the first record from a CSV file