<?php

namespace Tests\Helpers;

use PHPUnit\Framework\TestCase;
use Codemonster\Http\Response;

class ResponseHelperTest extends TestCase
{
    protected function setUp(): void
    {
        app()->singleton('response', fn() => new Response());
    }

    public function testResponseReturnsInstance()
    {
        $this->assertInstanceOf(Response::class, response());
    }

    public function testResponseSetsContent()
    {
        $res = response('Hello', 200);

        $this->assertInstanceOf(Response::class, $res);
        $this->assertSame('Hello', $res->getContent());
    }

    public function testJsonResponse()
    {
        $res = json(['ok' => true]);

        $this->assertInstanceOf(Response::class, $res);
        $this->assertJson($res->getContent());
        $this->assertJsonStringEqualsJsonString('{"ok":true}', $res->getContent());
    }
}
