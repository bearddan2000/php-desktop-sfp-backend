<?php

namespace Sfp\Test\Integration;

include_once __DIR__ . '/../Mock/MockClass.php';

use Sfp\Test\Mock\MockClass as MockClass;
use PHPUnit\Framework\TestCase as TestCase;

class PipelineTest extends TestCase {

  /**
  @test
  */
  public function mock_class(){
    $obj = new MockClass;
    $given = explode('::', $obj->main());
    $expected = 'hello Charlie';
    $actual = $given[0];
    $this->assertEquals($actual, $expected);
  }

}

?>
