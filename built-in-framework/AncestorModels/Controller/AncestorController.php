<?php

declare(strict_types = 1);

namespace AncestorModels\Controller;


class AncestorController
{
    private $pathToTemplates = "../tpl/";

    public function render(string $tplName, array $parameters): void
    {
        $loader = new \Twig_Loader_Filesystem($this->pathToTemplates);
        $twig = new \Twig_Environment($loader);
        echo $twig->render($tplName, $parameters);
    }
}