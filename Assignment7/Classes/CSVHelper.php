<?php
// This class should contain methods for reading, writing, updating, 
// and deleting information in a CSV file. 
class CSVHelper
{
    // READ
    static function read($file)
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
    // WRITE
    static function write($file, $data)
    {
        if (file_exists($file) and is_file($file)) { // check to make sure file is being passed
            $handle = fopen($file, 'w+'); // open file in write mode

            foreach ($data as $index) {
                fputcsv($handle, $index); // add new row to csv file
            }

            fclose($handle);
        } else {
            die("Error: The file does not exist."); // return error if not a file
        }
        return true;
    }
    // UPDATE
    static function update($file, $values)
    {
        $csv_array = [];
        if (file_exists($file) and is_file($file)) { // Check if file exists before proceeding
            $handle = fopen($file, 'r'); // open the file
            while (($row = fgetcsv($handle)) !== false) {
                $csv_array[] = $row; // append csv to array
            }
            fclose($handle); // close the file
        } else {
            die("Error: The file does not exist."); // return error if not a file
        }
        foreach ($csv_array as $search => $replace) {
            if ($replace[0] == array_values($values)[0]) { // check if passed key matches
                $csv_array[$search] = array_replace($csv_array[$search], $values); // replace the associative array within the multidimensinal array
            }
        }
        $fp = fopen($file, 'w'); //write-only mode
        foreach ($csv_array as $val) { //Re-write the edited array to csv
            fputcsv($fp, $val);
        }
        fclose($fp);

        return true;
    }
    // DELETE
    static function delete($file, $index)
    {
        $csv_array = [];

        if (file_exists($file) and is_file($file)) { // Check if file exists before proceeding
            $handle = fopen($file, 'r'); // open the file
            while (($row = fgetcsv($handle)) !== false) {
                $csv_array[] = $row; // append csv to array
            }
            fclose($handle); // close the file
        } else {
            die("Error: The file does not exist."); // return error if not a file
        }

        foreach ($csv_array as $key => $val) {
            if ($val[0] == $index) { // Match $element with id in csv
                unset($csv_array[$key]); // Remove row
            }
        }

        $fp = fopen($file, 'w'); //write-only mode
        foreach ($csv_array as $val) { //Re-write the edited array to csv
            fputcsv($fp, $val);
        }
        fclose($fp);

        return true;
    }
}