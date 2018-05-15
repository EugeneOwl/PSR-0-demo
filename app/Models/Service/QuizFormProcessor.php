<?php

declare(strict_types = 1);

namespace Models\Service;

use \AncestorModels\Service\AncestorFormProcessorService;

class QuizFormProcessor extends AncestorFormProcessorService
{
    private const SAFE_MESSAGE = "Safe input.";
    private const UNSAFE_MESSAGE = "Dangerous input.";
    private const EMPTY_MESSAGE = "Empty input.";
    private const NOT_EMPTY_MESSAGE = "Not empty input.";

    public function getClearName(?string $name): string
    {
        return $this->cleanInput($name);
    }

    public function getInputStatus(array $data): string
    {
        $status = $this->isDataValid($data) ? self::SAFE_MESSAGE : self::UNSAFE_MESSAGE;
        $status .= $this->isDataEmpty($data) ? self::EMPTY_MESSAGE : self::NOT_EMPTY_MESSAGE;
        return $status;
    }

    private function isDataValid(array $data): bool
    {
        foreach ($data as $element) {
            if (!$this->isInputSafe($element)) {
                return false;
            }
        }
        return true;
    }
}