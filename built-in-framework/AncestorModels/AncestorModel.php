<?php

declare(strict_types = 1);

namespace AncestorModels;

use \Models\Config\Config;

class AncestorModel
{
    public function __construct()
    {
        ini_set("error_log", Config::DEV_LOG_FILE);
    }
}