<?php

declare(strict_types = 1);

namespace AncestorModels\Repository;


use \AncestorModels\Repository\PDO as MyPDO;
use \AncestorModels\AncestorModel;

abstract class AncestorRepository extends AncestorModel
{
    public function connection()
    {
        return MyPDO::getConnection();
    }
}