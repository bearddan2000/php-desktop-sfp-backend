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
class Even
{
    public function execute($filename = '')
    {

        // check the input variable
        EMessage::ERROR_EMPTY_VARIABLE($filename, __METHOD__);

        $obj = new Pipeline($filename);

        return $obj->addStage([Even::class, 'readFile'])
               ->addStage([Even::class, 'filterArray'])
               ->addStage([Even::class, 'math_on_elements'])
               ->process();
    }

    public function readFile($filename = '')
    {

        // check the input variable
        EMessage::ERROR_EMPTY_VARIABLE($filename, __METHOD__);

        return Filereader::read_text_file($filename);
    }

    public function filterArray(array $dataset = [])
    {

        // check the input variable
        EMessage::ERROR_EMPTY_ARRAY($dataset, __METHOD__);

        $output = [];

        // filter out even numbers
        for ($i=0; $i<count($dataset); $i++) {
            $x = $dataset[$i];
            if ($x % 2 == 0) {
                array_push($output, $x);
            }
        }

        return $output;
    }

    public function math_on_elements(array $output = [])
    {
        // check the input variable
        EMessage::ERROR_EMPTY_ARRAY($output, __METHOD__);

        return count($output);
    }
}
