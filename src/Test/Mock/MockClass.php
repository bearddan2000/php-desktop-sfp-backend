<?php

namespace Sfp\Test\Mock;

include_once __DIR__ . '/../../Helpers/Pipeline.php';

use Sfp\Helpers\Pipeline as Pipeline;

class MockClass {
    public function main(){
      $obj = new Pipeline('hello');

      return $obj->addStage([MockClass::class, 'method1'])
                ->addStage([MockClass::class, 'method2'])
                ->addStage([MockClass::class, 'method3'])
                ->process();
    }
    public function method1($arg = ''){
      return $arg . ' Charlie::';
    }
    public function method2($arg = ''){
      return $arg . 'Harry::';
    }
    public function method3($arg = ''){
      return $arg . 'Robert';
    }
  }
  ?>