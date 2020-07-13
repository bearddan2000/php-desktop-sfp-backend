<?php
namespace Sfp;

include_once __DIR__ . '/Helpers/HeaderDef.php';

use Sfp\Helpers\Filereader as Filereader;
use Sfp\Helpers\Pipeline as Pipeline;
use Sfp\Helpers\EMessage as EMessage;

/*
    1. read from assets/numbers.csv
    2. filter even numbers
    3. return count of even numbers
*/
class Math
{
    public function execute($filename = '')
    {

        // check the input variable
        EMessage::ERROR_EMPTY_VARIABLE($filename, __METHOD__);

        $obj = new Pipeline($filename);

        return $obj->addStage([Math::class, 'readFile'])
               ->addStage([Math::class, 'filterArray'])
               ->addStage([Math::class, 'math_on_elements'])
               ->process();
    }



    public function readFile($filename = '')
    {

        // check the input variable
        EMessage::ERROR_EMPTY_VARIABLE($filename, __METHOD__);

        return Filereader::read_csv_file($filename);
    }


    public function filterArray(array $dataset = [])
    {
        // check the input variable
        EMessage::ERROR_EMPTY_ARRAY($dataset, __METHOD__);

        // check field 'accept' exists
        EMessage::ERROR_OBJ_NULL($dataset[0]['accept'], __METHOD__);

        $output = [];

        // filter out even numbers
        for ($i=0; $i<count($dataset); $i++) {
            $x = $dataset[$i];
            if ($x['accept'] == true) {
                array_push($output, $x);
            }
        }

        return $output;
    }


    public function math_on_elements(array $output = [])
    {
        // check the input variable
        EMessage::ERROR_EMPTY_ARRAY($output, __METHOD__);

        // check field 'value' exists
        EMessage::ERROR_OBJ_NULL($output[0]['value'], __METHOD__);

        $sum = 0;

        $count = count($output);

        for ($i=0; $i<$count; $i++) {
            $sum = $sum + (double)$output[$i]['value'];
        }

        $val = $sum / $count;

        return round($val, 10);
    }
}
