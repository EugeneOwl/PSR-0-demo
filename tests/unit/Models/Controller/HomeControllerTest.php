<?php

namespace UnitTests\Models\Controller;

use \UnitTests\Ancestors\Controller\TestAncestorController;
use \Models\Controller\HomeController;

class HomeControllerTest extends TestAncestorController
{
    public $fixture;

    public function setUp()
    {
        $this->fixture = new HomeController();
    }
}