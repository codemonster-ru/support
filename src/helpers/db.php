<?php

use Codemonster\Database\DatabaseManager;
use Codemonster\Database\Contracts\ConnectionInterface;
use Codemonster\Database\Schema\Schema;

/**
 * Get a database connection.
 */
function db(?string $connection = null): ConnectionInterface
{
    /** @var DatabaseManager $manager */
    $manager = app(DatabaseManager::class);

    return $manager->connection($connection);
}

/**
 * Get schema builder.
 */
function schema(?string $connection = null): Schema
{
    return db($connection)->schema();
}

/**
 * Run transaction.
 */
function transaction(callable $callback, ?string $connection = null): mixed
{
    return db($connection)->transaction($callback);
}
