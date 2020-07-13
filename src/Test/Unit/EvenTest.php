<?php
namespace Sfp\Test\Unit;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Even as Even;
use PHPUnit\Framework\TestCase as TestCase;

class EvenTest extends TestCase
{
    protected $obj = null;

    protected function setUp()
    {
        $this->obj = new Even;
    }

    /**
    @test
    */
    public function filterArray()
    {
        $given = [1,2,3,4];
        $expected = [2,4];
        $actual = $this->obj->filterArray($given);

        $this->assertEquals($actual, $expected);
    }

    /**
    @test
    */
    public function math_on_elements()
    {
        $given = [1,2];
        $expected = 2;
        $actual = $this->obj->math_on_elements($given);

        $this->assertEquals($actual, $expected);
    }
}
