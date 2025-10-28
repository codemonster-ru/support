<?php

use Codemonster\Dumper\Dumper;

if (!function_exists('dump')) {
    function dump(...$vars)
    {
        foreach ($vars as $var) {
            Dumper::dump($var);
        }

        return count($vars) === 1 ? $vars[0] : $vars;
    }
}

if (!function_exists('dd')) {
    function dd(...$vars): never
    {
        dump(...$vars);

        exit(1);
    }
}
