<?php

declare(strict_types = 1);

namespace Models\Controller;

use \AncestorModels\Controller\AncestorController;
use \Models\Service\QuizFormProcessor;

class QuizController extends AncestorController
{
    private const TPL_NAME = "quiz.html.twig";

    public function run()
    {
        $formProcessor = new QuizFormProcessor();
        $clearName = $formProcessor->getClearName($_POST["name"]);
        $inputStatus = $formProcessor->getInputStatus($_POST);

        $this->render(self::TPL_NAME, [
            "inputStatus" => $inputStatus,
            "clearName"   => $clearName,
        ]);
    }
}