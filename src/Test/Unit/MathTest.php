<?php
namespace Sfp\Test\Unit;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Math as Math;
use PHPUnit\Framework\TestCase as TestCase;

class MathTest extends TestCase
{
    protected $obj = null;
    protected $given = array();

    protected function setUp()
    {
        $this->obj = new Math;
        $this->mock_csv_data();
    }

    private function mock_csv_data()
    {
        $raw = "accept,value::false,1::true,1::false,2::true,3";
        $rows = explode("::", $raw);       // Separate lines

        $headings = explode(',', $rows[0]); // Turn headings on first line into array
      unset($rows[0]);                    // Remove headings from data set

      foreach ($rows as $row) {
          $dataset = explode(',', $row);
          $dataset[0] = filter_var($dataset[0], FILTER_VALIDATE_BOOLEAN);
          $dataset[1] = (int)$dataset[1];
          $this->given[] = array_combine($headings, $dataset);
      }
    }


    /**
    @test
    */
    public function filterArray()
    {
        $expected = [$this->given[1], $this->given[3]];
        $actual = $this->obj->filterArray($this->given);

        $this->assertTrue(
            $actual[0]['accept'] == $expected[0]['accept']
      && $actual[0]['value'] == $expected[0]['value']
      && $actual[1]['accept'] == $expected[1]['accept']
      && $actual[1]['value'] == $expected[1]['value']
        );
    }

    /**
    @test
    */
    public function math_on_elements()
    {
        $given = [];
        array_push($given, $this->given[1]);
        array_push($given, $this->given[3]);

        $expected = 2.0;
        $actual = $this->obj->math_on_elements($given);

        $this->assertEquals($actual, $expected);
    }
}
