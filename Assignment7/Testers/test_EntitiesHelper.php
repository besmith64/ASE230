<?php

require_once('../Classes/Entities.php');

//JSON
// READ
// echo '<pre>';
// print_r(JSONHelper::read('../test.json')); // read a recordset from a JSON file

// WRITE
// JSONHelper::write('../test.json', [['id' => 11, 'first_name' => 'John', 'last_name' => 'Lennon'], ['id' => 12, 'first_name' => 'Paul', 'last_name' => 'McCartney']]); // write a recordset to a JSON file

// MODIFY
// JSONHelper::update('../test.json', 0, ['id' => 1, 'first_name' => 'Joe', 'last_name' => 'Burrow']); // modify the record in a JSON file

// DELETE
//JSONHelper::delete('../test.json', 4); // delete the first record from a JSON file

//CSV

// READ
// echo '<pre>';
// print_r(CSVHelper::read('../test.csv')); // read a recordset from a CSV file

// WRITE
// CSVHelper::write('../test.csv', [['id' => 11, 'first_name' => 'John', 'last_name' => 'Lennon'], ['id' => 12, 'first_name' => 'Paul', 'last_name' => 'McCartney']]); // write a recordset to a JSON file

// MODIFY
// CSVHelper::update('../test.csv',, array(0 => 1, 1 => 'John', 2 => 'Lennon')); // modify the record in a CSV file

// DELETE
// CSVHelper::delete('../test.csv', 4); // delete the first record from a CSV file