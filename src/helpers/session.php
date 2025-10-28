<?php

if (!function_exists('session')) {
    function session(?string $key = null, mixed $value = null): mixed
    {
        $session = app('session');

        if ($key === null) {
            return $session;
        }

        if ($value === null) {
            return $session->get($key);
        }

        $session->put($key, $value);

        return $session;
    }
}
