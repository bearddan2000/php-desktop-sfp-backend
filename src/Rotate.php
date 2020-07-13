<?php
namespace Sfp;

include_once __DIR__ . '/Helpers/HeaderDef.php';

use Sfp\Helpers\Filereader as Filereader;
use Sfp\Helpers\EMessage as EMessage;

/*
  1. read dataset from assets/rotate.jason
  2. left rotate array
     - solution found at Hackerank
*/
class Rotate
{
    private $number = 0;

    public function __construct($number = 0)
    {
        // check the input variable
        EMessage::ERROR_ISN_NUMBER($number, __METHOD__);

        $this->number = $number;
    }

    public function get_number()
    {
        return $this->number;
    }

    public function execute($filename = '')
    {

    // check the input variable
        EMessage::ERROR_EMPTY_VARIABLE($filename, __METHOD__);

        $input = Filereader::read_json_file($filename);

        return $this->series($input, $this->number);
    }

    public function series(array $input, int $num)
    {
        // check the input variable
        EMessage::ERROR_ISN_NUMBER($num, __METHOD__);

        $ct = count($input);
        $output = array_fill(0, $ct, null);
        
        foreach ($input as $key => $value) {
            // code...
            $newindex = $key + $num;
            if ($newindex > $ct) {
                $newindex -= $ct;
            }

            $output[$newindex] = $value;
        }
        $tmp = array_pop($output);
        $output[0] = $tmp;

        return $output;
    }
}
