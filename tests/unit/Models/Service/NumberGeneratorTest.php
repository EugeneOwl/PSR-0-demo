<?php

namespace UnitTests\Models\Service;

use \PHPUnit\Framework\TestCase;
use \Models\Service\NumberGenerator;

class NumberGeneratorTest extends TestCase
{
    private $fixture;

    public function setUp()
    {
        $this->fixture = new NumberGenerator();
    }

    /**
     * @test
     * @dataProvider providerGenerateNumber
     */
    public function generateNumberInDiapason($min, $max)
    {
        list($min, $max) = $this->getMinMax($min, $max);
        $result = $this->fixture->generateNumber($min, $max);

        $this->assertTrue($result > $min - 1 && $result < $max + 1);
    }

    /**
     * @test
     * @dataProvider providerGenerateNumber
     */
    public function generateNumberRamdomly($min, $max)
    {
        list($min, $max) = $this->getMinMax($min, $max);

        if ($min == $max) {
            $this->assertTrue(true);
            return;
        }

        $results = $this->getSeriesOfGenerateNumberResults($min, $max);
        $this->assertNotCount(1, array_unique($results));
    }

    /**
     * @test
     * @dataProvider providerGenerateNumberInvalid
     * @expectedException \Exception
     */
    public function generateNumberInvalidMinMax($min, $max)
    {
        list($min, $max) = $this->getMinMax($min, $max);
        $this->fixture->generateNumber($min, $max);
    }

    /**
     * @test
     * @dataProvider providerGenerateNumber
     */
    public function preventRandom($min, $max)
    {
        $min = $min ?? $this->fixture::DEFAULT_MIN;
        $max = $max ?? $this->fixture::DEFAULT_MAX;

        $this->fixture->preventRandom();
        $num1 = $this->fixture->generateNumber($min, $max);
        $this->fixture->preventRandom();
        $num2 = $this->fixture->generateNumber($min, $max);

        $this->assertEquals(
            $num1,
            $num2
        );
    }

    private function getSeriesOfGenerateNumberResults($min, $max, $seriesSize = 100)
    {
        $results = [];
        for ($time = 0; $time < $seriesSize; $time++) {
            $results[] = $this->fixture->generateNumber($min, $max);
        }
        return $results;
    }

    public function getMinMax($min, $max)
    {
        $min = $min ?? $this->fixture::DEFAULT_MIN;
        $max = $max ?? $this->fixture::DEFAULT_MAX;
        return [$min, $max];
    }

    public function providerGenerateNumber()
    {
        return [
            [10, 11],
            [-3, -3],
            [null, null],
            [-100, null],
            [-100, 100],
        ];
    }

    public function providerGenerateNumberInvalid()
    {
        return [
            [0, -5],
            [100000, null],
            [null, -100000]
        ];
    }
}