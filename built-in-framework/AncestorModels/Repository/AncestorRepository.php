<?php

declare(strict_types = 1);

namespace AncestorModels\Repository;


use \AncestorModels\Repository\PDO as MyPDO;

abstract class AncestorRepository
{
    public function connection()
    {
        return MyPDO::getConnection();
    }
}