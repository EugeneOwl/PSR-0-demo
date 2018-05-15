<?php

use MVCModules\Controller\MainController as Controller;
use MVCModules\View\MainView as View;
use MVCModules\Services\Randomizer as Randomizer;

require_once __DIR__ . "/../app/start.php";

$controller = new Controller();
$view = new View();
$randomizer = new Randomizer();
