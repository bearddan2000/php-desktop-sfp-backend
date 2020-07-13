<?php
namespace Sfp\Test\Unit;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Helpers\Filereader as Filereader;
use PHPUnit\Framework\TestCase as TestCase;

class FilereaderTest extends TestCase
{
    protected $mock_data = '';

    protected function setUp()
    {
        $this->mock_data = __DIR__ . '/../Mock/Data/';
    }

    /**
    @test
    */
    public function read_text_file()
    {
        $dir = $this->mock_data;
        $expected = 3;
        $actual = Filereader::read_text_file($dir . 'numbers.csv');
        $this->assertEquals($actual[2], $expected);
    }

    /**
    @test
    */
    public function read_csv_file()
    {
        $dir = $this->mock_data;
        $expected = 'true';
        $actual = Filereader::read_csv_file($dir . 'tabular.csv');
        $this->assertEquals($actual[0]['accept'], $expected);
    }

    /**
    @test
    */
    public function read_json_file()
    {
        $dir = $this->mock_data;
        $expected = "foo";
        $actual = Filereader::read_json_file($dir . 'rotate.json');
        $this->assertEquals($actual[0], $expected);
    }
}
