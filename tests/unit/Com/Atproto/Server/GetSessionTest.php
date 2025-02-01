<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\GetSession;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetSession::class)]
final class GetSessionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
