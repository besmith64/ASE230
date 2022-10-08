<?php
// one function for reading the content of a CSV-formatted file into a PHP array (with all the records)
function read_csv($file)
{
    if (file_exists($file) and is_file($file)) { // Check if file exists before proceeding
        $read_file = fopen($file, 'r'); // open the file
        while (!feof($file)) {
            $csv_array[] = fgetcsv($file); // append csv to array
        }
        fclose($file); // close the file
    } else {
        die("Error: The file does not exist."); // return error if not a file
    }
    return $csv_array; // return the array
}
// one function for reading the content of a CSV-formatted file into a PHP array and returning one element with index $element (i.e., only one record )
function read_one_csv_element($file, $element)
{
    $f = read_csv($file); // pass to read_csv function to get array
    foreach ($f as $key => $val) {
        if ($key == $element) { // match the value to the index
            return $val; // return the single value
        }
    }
}
// one function for adding a new record to a CSV-formatted file
function write_csv($file, $values)
{
    if (file_exists($file) and is_file($file)) {
        $f = fopen($file, 'w');
        foreach ($values as $line) {
            fputcsv($f, $line);
        }

        fclose($f);
    } else {
        die("Error: The file does not exist."); // return error if not a file
    }
}
// one function for modifying the record on a specific line

// one function for emptying the record on a specific line (delete the content of a line, but leave an empty line  in the file)

// one function for deleting a line from the file (delete the line altogether)