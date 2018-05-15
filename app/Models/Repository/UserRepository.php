<?php

declare(strict_types = 1);

namespace Models\Repository;

use \AncestorModels\Repository\AncestorRepository;

class UserRepository extends AncestorRepository
{
    public function getUsers(): array
    {
        $statement = $this->connection()->prepare("SELECT `user`.`id`, `user`.`name` FROM `users` `user`;");
        $statement->execute();
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
}