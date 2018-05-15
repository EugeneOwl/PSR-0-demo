<?php

declare(strict_types = 1);

namespace Models\Service;

use \AncestorModels\Service\AncestorService;

class TextGenerator extends AncestorService
{
    public function generateText(): string
    {
        return <<< TEXT
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printer took a galley of type and scrambled it to make a type specimen book.
TEXT;
    }
}