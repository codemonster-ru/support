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

if (!function_exists('abort')) {
    function abort(int $status, string $message = '')
    {
        throw new class($message ?: "HTTP {$status}", $status)
        extends \RuntimeException
        implements \Codemonster\Support\Contracts\HttpStatusExceptionInterface
        {
            protected int $statusCode;

            public function __construct(string $message, int $status)
            {
                $this->statusCode = $status;
                parent::__construct($message, $status);
            }

            public function getStatusCode(): int
            {
                return $this->statusCode;
            }
        };
    }
}
