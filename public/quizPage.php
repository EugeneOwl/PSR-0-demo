<?php

declare(strict_types = 1);

use \Models\Controller\QuizController;

require_once "../app/start.php";

$controller = new QuizController();
$controller->run();
