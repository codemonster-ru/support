<?php

use Codemonster\Database\DatabaseManager;

if (!function_exists('db')) {
    function db(?string $name = null)
    {
        return app(DatabaseManager::class)->connection($name);
    }
}
