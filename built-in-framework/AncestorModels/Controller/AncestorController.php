<?php

declare(strict_types = 1);

namespace AncestorModels\Controller;

use \Models\Config\Config;
use \AncestorModels\AncestorModel;

abstract class AncestorController extends AncestorModel
{
    private const TPL_PATH = Config::TPL_DIRECTORY;

    public abstract function run();

    public function render(string $tplName, array $parameters): void
    {
        $loader = new \Twig_Loader_Filesystem(self::TPL_PATH);
        $twig = new \Twig_Environment($loader);
        echo $twig->render($tplName, $parameters);
    }
}