<?php
namespace Sfp;

include_once __DIR__ . '/Helpers/HeaderDef.php';

use Sfp\Helpers\EMessage as EMessage;

/*
  1. get 10 iterations of the series
*/
class Fibonacci
{
    public function execute()
    {

    // do 10 iterations of the series
        return $this->series([], 10);
    }

    // implementation of ISeries function
    public function series(array $output = [], $number = 0)
    {

        // check the input variable
        EMessage::ERROR_ISN_NUMBER($number, __METHOD__);

        $num1 = 0;
        $num2 = 1;

        $counter = 0;
        while ($counter < $number) {
            array_push($output, $num1);
            $num3 = $num2 + $num1;
            $num1 = $num2;
            $num2 = $num3;
            $counter = $counter + 1;
        }

        return $output;
    }
}
