<?php
namespace Sfp\Test\Functional;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Math as Math;
use PHPUnit\Framework\TestCase as TestCase;

class MathTest extends TestCase
{

  /**
  @test
  */
    public function filterArray()
    {
        $obj = new Math;
        $expected = 4.5;
        $actual = $obj->execute(__DIR__ . '/../Mock/Data/tabular.csv');
        $this->assertEquals($actual, $expected);
    }
}
