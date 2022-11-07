<?php
require_once('JSONHelper.php');
require_once('CSVHelper.php');


class Entities
{
    // This class/classes should contain methods for retrieving one or all the entities from a CSV/JSON file, creating, modifying, and deleting an entity.
    //READ
    static function read($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == 'json') {
            return JSONHelper::read($file);
        } elseif ($ext == 'csv') {
            return CSVHelper::read($file);
        }
    }
    //WRITE
    static function write($file, $data)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == 'json') {
            return JSONHelper::write($file, $data);
        } elseif ($ext == 'csv') {
            return CSVHelper::write($file, $data);
        }
    }
    //MODIFY
    static function update($file, $index = 0, $data)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == 'json') {
            return JSONHelper::update($file, $index, $data);
        } elseif ($ext == 'csv') {
            return CSVHelper::update($file, $data);
        }
    }
    //DELETE
    static function delete($file, $index)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == 'json') {
            return JSONHelper::delete($file, $index);
        } elseif ($ext == 'csv') {
            return CSVHelper::delete($file, $index);
        }
    }
}