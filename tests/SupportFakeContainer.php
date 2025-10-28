<?php

namespace Tests;

class SupportFakeContainer
{
    protected array $bindings = [];

    public function bind(string $abstract, callable $factory): void
    {
        $this->bindings[$abstract] = $factory;
    }

    public function singleton(string $abstract, callable $factory): void
    {
        $this->bindings[$abstract] = $factory();
    }

    public function has(string $abstract): bool
    {
        return isset($this->bindings[$abstract]);
    }

    public function make(string $abstract): mixed
    {
        $binding = $this->bindings[$abstract] ?? null;

        if (is_callable($binding)) {
            return $binding($this);
        }

        if ($binding !== null) {
            return $binding;
        }

        throw new \RuntimeException("Binding [$abstract] not found in fake container.");
    }
}
