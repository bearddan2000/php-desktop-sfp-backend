<?php
namespace Sfp\Test\Functional;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Even as Even;
use PHPUnit\Framework\TestCase as TestCase;

class EvenTest extends TestCase
{

  /**
  @test
  */
    public function execute()
    {
        $obj = new Even;
        $expected = 5;
        $actual = $obj->execute(__DIR__ . '/../Mock/Data/numbers.csv');

        $this->assertEquals($actual, $expected);
    }
}
