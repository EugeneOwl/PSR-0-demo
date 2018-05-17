<?php

namespace UnitTests\Models\Service;

use \PHPUnit\Framework\TestCase;
use \Models\Service\UsersProcessor;

class UserProcessorTest extends TestCase
{
    private $fixture;

    public function setUp()
    {
        $this->fixture = new UsersProcessor();
    }

    /**
     * @test
     * @dataProvider providerIsUserValid
     */
    public function isUserValidTest($user, $isValid)
    {
        $this->assertTrue($this->fixture->isUserValid($user) === $isValid);
    }

    public function providerIsUserValid()
    {
        return [
            [
                ["name" => "Eugene"],
                false
            ],
            [
                ["name" => "Paul"],
                true
            ],
            [
                ["name" => "Alexander"],
                false,
            ],
            [
                ["name" => ""],
                true,
            ]
        ];
    }

    /**
     * @depends isUserValidTest
     * @test
     */
    public function getValidUsers()
    {
        $users = $this->fixture->getValidUsers();
        foreach ($users as $user) {
            if (!$this->fixture->isUserValid($user)) {
                $this->fail("At least one of the users is not valid");
            }
        }
        $this->assertTrue(true);
    }
}
