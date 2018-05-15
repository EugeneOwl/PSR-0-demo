<?php

declare(strict_types = 1);

namespace Models\Controller;

use \AncestorModels\Controller\AncestorController;
use \Models\Service\TextGenerator;
use \Models\Service\NumberGenerator;
use \Models\Repository\UserRepository;

class HomeController extends AncestorController
{
    public function run($tplName)
    {
        $textGenerator = new TextGenerator();
        $text = $textGenerator->generateText();

        $numberGenerator = new NumberGenerator();
        $numberGenerator->preventRandom();
        $number = $numberGenerator->generateNumber(100, 105);

        $userRepo = new UserRepository();
        $users = $userRepo->getUsers();

        $this->render($tplName, [
            "text"   => $text,
            "number" => $number,
            "users"  => $users,
        ]);
    }
}