<?php

declare(strict_types = 1);

namespace Models\Service;

use \AncestorModels\Service\AncestorService;

class NumberGenerator extends AncestorService
{
    public const DEFAULT_MIN = 0;
    public const DEFAULT_MAX = 100;

    public function generateNumber(int $min = self::DEFAULT_MIN, int $max = self::DEFAULT_MAX): int
    {
        if ($min > $max) {
            throw new \Exception("Min must be lower than max.");
        }
        return mt_rand($min, $max);
    }

    public function preventRandom(): void
    {
        mt_srand(0);
    }
}