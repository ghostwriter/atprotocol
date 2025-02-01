<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\RefreshSession;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RefreshSession::class)]
final class RefreshSessionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
