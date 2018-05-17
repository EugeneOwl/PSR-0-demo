<?php

namespace UnitTests\Models\Controller;

use \UnitTests\Ancestors\Controller\TestAncestorController;
use \Models\Controller\QuizController;

class QuizControllerTest extends TestAncestorController
{
    public $fixture;

    public function setUp()
    {
        $this->fixture = new QuizController();
    }
}