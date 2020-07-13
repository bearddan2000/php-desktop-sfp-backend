<?php
namespace Sfp;

include_once __DIR__ . '/Helpers/HeaderDef.php';

use Sfp\Rotate as Rotate;
use Sfp\Helpers\EMessage as EMessage;

/*
  1. get left rotation from parent class.
  2. reverse array to get last element
  3. return string value
*/
class Extend extends Rotate
{
    public function ___construct($number = 0)
    {
        // check the input variable
        EMessage::ERROR_ISN_NUMBER($number, __METHOD__);

        parent::___construct($number);
    }

    public function execute($filename = '')
    {
        // check the input variable
        EMessage::ERROR_EMPTY_VARIABLE($filename, __METHOD__);

        $dataset = parent::execute($filename);

        // get the last element
        return array_pop($dataset);
    }
}
