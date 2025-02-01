<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\DescribeServer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DescribeServer::class)]
final class DescribeServerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
