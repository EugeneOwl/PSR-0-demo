<?php

declare(strict_types = 1);

namespace Models\Controller;

use \AncestorModels\Controller\AncestorController;
use \Models\Service\TextGenerator;
use \Models\Service\NumberGenerator;
use \Models\Service\UsersProcessor;

class HomeController extends AncestorController
{
    private const TPL_NAME = "home.html.twig";

    public function run(): void
    {
        $textGenerator = new TextGenerator();
        $text = $textGenerator->generateText();

        $numberGenerator = new NumberGenerator();
        $numberGenerator->preventRandom();
        try {
            $number = $numberGenerator->generateNumber(100, -105);
        } catch (\Exception $exception) {
            error_log($exception->getMessage());
            $number = -1;
        }

        $userProcessor = new UsersProcessor();
        $users = $userProcessor->getValidUsers();

        $this->render(self::TPL_NAME, [
            "header" => "Home page",
            "text"   => $text,
            "number" => $number,
            "users"  => $users,
        ]);
    }
}