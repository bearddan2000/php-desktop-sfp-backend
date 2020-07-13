<?php
namespace Sfp\Test\Integration;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Rotate as Rotate;
use PHPUnit\Framework\TestCase as TestCase;

class RotateTest extends TestCase
{

  /**
  @test
  */
    public function series()
    {
        $obj = new Rotate(4);
        $given = ['a','b','c'];
        $expected = ['c','a','b'];
        $actual = $obj->series($given, $obj->get_number());
        $this->assertEquals($actual, $expected);
    }
}
