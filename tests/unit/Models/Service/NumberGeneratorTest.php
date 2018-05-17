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
    public function generateNumber($min, $max)
    {
        $min = $min ?? $this->fixture::DEFAULT_MIN;
        $max = $max ?? $this->fixture::DEFAULT_MIN;
        $result = $this->fixture->generateNumber($min, $max);
        $this->assertTrue($result > $min - 1 && $result < $max + 1);
    }

    public function providerGenerateNumber()
    {
        return [
            [10, 20],
            [-3, -3],
            [null, null],
            [-100, null] //На рандомность проверить
        ];
    }

    /**
     * @test
     */
    public function preventRandom()
    {
        $this->fixture->preventRandom();
    }
}