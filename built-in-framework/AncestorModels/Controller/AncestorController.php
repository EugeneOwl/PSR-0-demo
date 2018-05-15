<?php

declare(strict_types = 1);

namespace AncestorModels\Controller;


abstract class AncestorController
{
    private const TPL_PATH = "../tpl/";

    public abstract function run();

    public function render(string $tplName, array $parameters): void
    {
        $loader = new \Twig_Loader_Filesystem(self::TPL_PATH);
        $twig = new \Twig_Environment($loader);
        echo $twig->render($tplName, $parameters);
    }
}