<?php
namespace Sfp\Test\Unit;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Rotate as Rotate;
use PHPUnit\Framework\TestCase as TestCase;

class RotateTest extends TestCase
{
    protected $mock_data = '';

    protected function setUp()
    {
        $this->mock_data = __DIR__ . '/../Mock/Data/';
    }
    /**
    @test
    */
    public function read_file()
    {
        $dir = $this->mock_data;
        $expected = true;
        $actual = Filereader::read_csv_file($dir . 'tabular.csv');
        $this->assertEquals($actual, $expected);
    }
}
