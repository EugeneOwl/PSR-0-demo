<?php

namespace Models\Config;


class Config
{
    public const PROJECT_DIRECTORY = "/home/eugene/PhpstormProjects/PSR-0-demo/";
    public const TPL_DIRECTORY = self::PROJECT_DIRECTORY . "tpl/";
    public const DEV_LOG_FILE = self::PROJECT_DIRECTORY . "var/log/dev_log.log";
    public const ENV_FILE = self::PROJECT_DIRECTORY . ".env";
}