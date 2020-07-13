<?php
namespace Sfp\Helpers;

class EMessage
{

    // error handlers
    public static function ERROR_EMPTY_VARIABLE($var, $method)
    {
        if (empty($var)) {
            $calledClass = get_called_class();
            $msg = "$var is empty in $calledClass::$method";
            throw new \Exception($msg, 1);
        }
    }

    public static function ERROR_EMPTY_ARRAY($var, $method)
    {
        if (count($var) == 0) {
            $calledClass = get_called_class();
            $msg = "$var is length 0 in $calledClass::$method";
            throw new \Exception($msg, 1);
        }
    }

    public static function ERROR_OBJ_NULL($var, $method)
    {
        if (is_null($var)) {
            $calledClass = get_called_class();
            $msg = "$var is null in $calledClass::$method";
            throw new \Exception($msg, 1);
        }
    }

    public static function ERROR_FILE_NOT_FOUND($var, $method)
    {
        if (!file_exists($var)) {
            $calledClass = get_called_class();
            $msg = "$var file is not found in $calledClass::$method";
            throw new \Exception($msg, 1);
        }
    }


    public static function ERROR_ISN_NUMBER($var, $method)
    {
        if (!is_numeric($var)) {
            $calledClass = get_called_class();
            $msg = "$var isn't a number in $calledClass::$method";
            throw new \Exception($msg, 1);
        }
    }

    public static function ERROR_ISN_CALLABLE($var, $method)
    {
        if (!is_callable($var)) {
            $calledClass = get_called_class();
            $msg = "$var isn't a number in $calledClass::$method";
            throw new \Exception($msg, 1);
        }
    }
}
