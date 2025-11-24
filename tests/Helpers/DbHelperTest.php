<?php

namespace Tests\Helpers;

use Codemonster\Database\DatabaseManager;
use PHPUnit\Framework\TestCase;
use Tests\SupportFakeContainer;
use Tests\Fakes\FakeConnection;
use Tests\Fakes\FakeDatabaseManager;

class DbHelperTest extends TestCase
{
    protected SupportFakeContainer $container;

    protected function setUp(): void
    {
        $this->container = app();
        $this->container->reset();
    }

    public function test_db_returns_connection()
    {
        $connection = new FakeConnection();

        $manager = new FakeDatabaseManager($connection);

        $this->container->singleton(DatabaseManager::class, fn() => $manager);

        $db = db();

        $this->assertSame(
            $connection,
            $db,
            'db() must return a FakeConnection instance from FakeDatabaseManager'
        );
    }

    public function test_db_passes_connection_name()
    {
        $connection = new FakeConnection();

        $manager = new class($connection) extends FakeDatabaseManager {
            public ?string $lastName = null;

            public function connection(?string $name = null): \Codemonster\Database\Contracts\ConnectionInterface
            {
                $this->lastName = $name;

                return $this->connection;
            }
        };

        $this->container->singleton(DatabaseManager::class, fn() => $manager);

        $db = db('secondary');

        $this->assertSame('secondary', $manager->lastName);
        $this->assertSame($connection, $db);
    }
}
