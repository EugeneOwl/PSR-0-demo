<?php

declare(strict_types = 1);

namespace Models\Service;

use \AncestorModels\Service\AncestorService;
use \Models\Repository\UserRepository;

class UsersProcessor extends AncestorService
{
    private const USER_VALID_LENGTH = 6;

    public function isUserValid(array $user): bool
    {
        return strlen($user["name"]) < self::USER_VALID_LENGTH;
    }

    public function getValidUsers(): array
    {
        $userRepo = new UserRepository();
        $users = $userRepo->getUsers();
        $validUsers = array_filter($users, "self::isUserValid");
        return $validUsers;
    }

}