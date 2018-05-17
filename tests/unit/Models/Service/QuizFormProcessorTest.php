<?php

namespace UnitTests\Models\Service;

use \PHPUnit\Framework\TestCase;
use \Models\Service\QuizFormProcessor;

class QuizFormProcessorTest extends TestCase
{
    private $fixture;

    public function setUp()
    {
        $this->fixture = new QuizFormProcessor();
    }

    /**
     * @test
     * @dataProvider providerGetClearName
     */
    public function getClearName($name)
    {
        $this->assertEquals(
            strip_tags($this->fixture->getClearName($name)),
            $this->fixture->getClearName($name)
        );
    }

    public function providerGetClearName()
    {
        return [
            ["Eugene"],
            ["<script>alert()</script>"],
            ["<br>"],
            ["<b>Basil</b>"],
        ];
    }

    /**
     * @test
     * @dataProvider providerIsDataValid
     */
    public function isDataValid($data, $isValid)
    {
        $this->assertEquals($this->fixture->isDataValid($data), $isValid);
    }

    public function providerIsDataValid()
    {
        return [
            [
                ["Eugene", "<danger>Eugene<danger>"],
                false, false
            ],
            [
                ["", null],
                true, true
            ],
            [
                ["Normal", "Ubuntu", ""],
                true, false
            ],
            [
                ["Basil", null, "<b>bold</b>", null],
                false, false
            ]
        ];
    }

    /**
     * @test
     * @depends isDataValid
     * @dataProvider providerIsDataValid
     */
    public function getInputStatus($data, $isValid, $isEmpty)
    {
        $status = $this->fixture->getInputStatus($data);
        if ($isValid) {
            $this->assertRegExp("/" . $this->fixture::SAFE_MESSAGE . "/", $status);
        } else {
            $this->assertRegExp("/" . $this->fixture::UNSAFE_MESSAGE . "/", $status);
        }
        if ($isEmpty) {
            $this->assertRegExp("/" . $this->fixture::EMPTY_MESSAGE . "/", $status);
        } else {
            $this->assertRegExp("/" . $this->fixture::NOT_EMPTY_MESSAGE . "/", $status);
        }
    }
}