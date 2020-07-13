<?php
namespace Sfp\Test\Unit;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Fibonacci as Fibonacci;
use PHPUnit\Framework\TestCase as TestCase;

class FibonacciTest extends TestCase
{

  /**
  @test
  */
    public function series()
    {
        $obj = new Fibonacci;
        $expected = [0,1,1,2];
        $actual = $obj->series([], 4);

        $this->assertEquals($actual, $expected);
    }
}
