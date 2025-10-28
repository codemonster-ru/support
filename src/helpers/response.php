<?php

use Codemonster\Http\Response;

if (!function_exists('response')) {
    function response(string $content = '', int $status = 200, array $headers = []): Response
    {
        $response = app('response');

        if ($content !== '') {
            $response->setContent($content);
        }

        $response->setStatusCode($status)
            ->setHeaders($headers);

        return $response;
    }
}

if (!function_exists('json')) {
    function json(mixed $data, int $status = 200, array $headers = []): Response
    {
        return Response::json($data, $status, $headers);
    }
}
