<?php
// one function for reading the content of a CSV-formatted file into a PHP array (with all the records)
function read_csv($file)
{
    if (file_exists($file) and is_file($file)) { // Check if file exists before proceeding
        $handle = fopen($file, 'r'); // open the file
        while (($row = fgetcsv($handle)) !== false) {
            $csv_array[] = $row; // append csv to array
        }
        fclose($handle); // close the file
    } else {
        die("Error: The file does not exist."); // return error if not a file
    }
    return $csv_array; // return the array
}
// one function for reading the content of a CSV-formatted file into a PHP array and returning one element with index $element (i.e., only one record )
function read_one_csv_element($file, $element)
{
    $handle = read_csv($file); // pass to read_csv function to get array
    foreach ($handle as $val) {
        if ($val[0] == $element) { // match the value to the index
            return $val[1]; // return the single value
        }
    }
}
// one function for adding a new record to a CSV-formatted file
function write_csv($file, $values)
{
    if (file_exists($file) and is_file($file)) { // check to make sure file is being passed
        $handle = fopen($file, 'a+'); // open file in write modee

        fputcsv($handle, $values); // add new row to csv file

        fclose($handle);
    } else {
        die("Error: The file does not exist."); // return error if not a file
    }
}
// one function for modifying the record on a specific line
function edit_csv($file, $values)
{
    $handle = read_csv($file); // pass to read_csv function to get array
    foreach ($handle as $search => $replace) {
        if ($replace[0] == key($values)) { // check if passed key matches
            $new = array( // append passed values to insert into multidimensional array
                0 => key($values),
                1 => $values[key($values)]
            );
            $handle[$search] = array_replace($handle[$search], $new); // replace the associative array within the multidimensinal array
        }
    }
    $fp = fopen($file, 'w'); //write-only mode
    foreach ($handle as $val) { //Re-write the edited array to csv
        fputcsv($fp, $val);
    }
    fclose($fp);
}
// one function for emptying the record on a specific line (delete the content of a line, but leave an empty line  in the file)

// one function for deleting a line from the file (delete the line altogether)

//Testing Area
$quote = array(
    9 => 'Test'
);
// print_r(edit_csv('data\quotes.csv', $quote));
// print_r(value($quote));