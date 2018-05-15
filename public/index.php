<?php

declare(strict_types = 1);

use \Models\Controller\HomeController;

require_once "../app/start.php";

$controller = new HomeController();
$controller->run("home.html.twig");
