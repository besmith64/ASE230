<?php
// This class should contain methods for reading, writing, updating, 
// and deleting information in a JSON file. 
class JSONHelper
{
    #read
    static function read($file)
    {
        // Check if file exists
        if (file_exists($file)) {
            $json_text = file_get_contents($file); // Get data from file

            // Decode the JSON file
            $json_data = json_decode($json_text, true);

            // return the data
            return $json_data;
        } else {
            die("Error: The file does not exist."); // return error if not a file
        }
    }
    #write
    static function write($file, $data)
    {
        $rows = [];
        // Check if file exists
        if (file_exists($file)) {
            foreach ($data as $key => $value) $rows[$key] = $value;
            $fh = fopen($file, 'w+');
            fwrite($fh, json_encode($rows));
            fclose($fh);
            return true;
        } else {
            die("Error: The file does not exist."); // return error if not a file
        }
    }
    #update
    static function update($file, $index, $data)
    {
        // Check if file exists
        if (file_exists($file)) {
            $rows = json_decode(file_get_contents($file), true); // read data from file
            if (!isset($rows[$index])) return false; // return if row does not exist
            $rows[$index] = array_merge($rows[$index], $data);

            // encode array to json and save to file
            file_put_contents($file, json_encode($rows));
            return true;
        } else {
            die("Error: The file does not exist."); // return error if not a file
        }
    }
    #delete
    static function delete($file, $index)
    {
        // Check if file exists
        if (file_exists($file)) {
            $rows = json_decode(file_get_contents($file), true); // read data from file
            if (!isset($rows[$index])) return false; // return if row does not exist
            unset($rows[$index]); // Remove row
            // encode array to json and save to file
            file_put_contents($file, json_encode($rows));
            return true;
        } else {
            die("Error: The file does not exist."); // return error if not a file
        }
    }
}