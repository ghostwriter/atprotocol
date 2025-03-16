<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\CreateSession;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreateSession::class)]
final class CreateSessionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
