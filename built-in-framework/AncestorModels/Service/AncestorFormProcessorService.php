<?php

declare(strict_types = 1);

namespace AncestorModels\Service;


class AncestorFormProcessorService extends AncestorService
{
    protected function isInputSafe(?string $input): bool
    {
        return $input === htmlspecialchars($input);
    }

    protected function cleanInput(?string $input): string
    {
        return htmlspecialchars((string)$input);
    }

    protected function isDataEmpty(?array $data): bool
    {
        return empty(array_filter($data, "self::isElementFilled"));
    }

    private function isElementFilled(?string $element): bool
    {
        return !empty(trim((string)$element));
    }
}