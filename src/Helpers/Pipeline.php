<?php
namespace Sfp\Helpers;

include_once __DIR__ . '/HeaderDef.php';

use Sfp\Helpers\EMessage as EMessage;

class Pipeline
{
    private $stages = [];
    private $result;

    /*
      1. capture first argument the other functions will
         use the returned value.
    */
    public function __construct($arg)
    {
        EMessage::ERROR_EMPTY_VARIABLE($arg, __METHOD__);

        $this->result = $arg;
    }

    // push callable methods onto our stack
    public function addStage($callback = null)
    {

        // check variable is callable
        EMessage::ERROR_OBJ_NULL($callback, __METHOD__);

        // check variable is callable
        EMessage::ERROR_ISN_CALLABLE($callback, __METHOD__);

        array_push($this->stages, $callback);
        return $this;
    }

    public function process()
    {
        for ($i=0; $i<count($this->stages); $i++) {

      // get the method
            $callback = $this->stages[$i];

            /*
              1. use the current result as a parameter
              2. save the returned value into result
            */
            $this->result = call_user_func($callback, $this->result);
        }

        return $this->result;
    }
}
