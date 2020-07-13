<?php
namespace Sfp\Test\Functional;

include_once __DIR__ . '/../../Helpers/HeaderDef.php';

use Sfp\Fibonacci as Fibonacci;
use Sfp\Helpers\Filereader as Filereader;
use PHPUnit\Framework\TestCase as TestCase;

class FibonacciTest extends TestCase
{

  /**
  @test
  */
    public function array_contains()
    {

    // used to count number of matches
        $result = -1;

        $obj = new Fibonacci;
        $given = Filereader::read_text_file(__DIR__ . '/../Mock/Data/fibonacci.csv');
        $actual = $obj->execute(5);

        // iterate over the desired dataset
        for ($i=0; $i<count($given); $i++) {

      // inner loop to lookup desired number
            for ($j=0; $j<count($actual); $j++) {

        /*
          1. if we find a match count and exit inner lookup
          2. we will compare count to number in dataset
        */
                if ($given[$i] == $actual[$j]) {
                    $result++;
                    break;
                }
            }
        }

        $this->assertEquals($result, count($given)-1);
    }
}
