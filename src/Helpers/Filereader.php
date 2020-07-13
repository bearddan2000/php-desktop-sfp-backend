<?php
namespace Sfp\Helpers;

include_once __DIR__ . '/HeaderDef.php';

use Sfp\Helpers\EMessage as EMessage;

class Filereader
{
    public static function read_text_file($filename)
    {

        // check the input variable
        EMessage::ERROR_FILE_NOT_FOUND($filename, __METHOD__);

        // read file into an array
        return file($filename, FILE_IGNORE_NEW_LINES);
    }

    public static function read_csv_file($filename)
    {

        // check the input variable
        EMessage::ERROR_FILE_NOT_FOUND($filename, __METHOD__);

        // read file into assoviative array
        $csv = array_map('str_getcsv', file($filename));

        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });

        array_shift($csv); # remove column header

        return $csv;
    }

    public static function read_json_file($filename)
    {

        // check the input variable
        EMessage::ERROR_FILE_NOT_FOUND($filename, __METHOD__);

        $file_content = file_get_contents($filename);

        return json_decode($file_content, true);
    }
}
