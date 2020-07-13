<?php
namespace Sfp\Test\Functional;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Extend as Extend;
use PHPUnit\Framework\TestCase as TestCase;

class ExtendTest extends TestCase
{

  /**
  @test
  */
    public function execute()
    {
        $obj = new Extend(1);
        $expected = "buzz";
        $actual = $obj->child_execute(__DIR__ . '/../Mock/Data/rotate.json');
        $this->assertEquals($actual, $expected);
    }
}
