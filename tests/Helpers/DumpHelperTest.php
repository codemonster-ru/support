<?php

namespace Tests\Helpers;

use PHPUnit\Framework\TestCase;

class DumpHelperTest extends TestCase
{
    public function testDumpReturnsValue()
    {
        $value = dump('Codemonster');

        $this->assertSame('Codemonster', $value);
    }
}
