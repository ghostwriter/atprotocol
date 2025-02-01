<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\CreateInviteCode;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreateInviteCode::class)]
final class CreateInviteCodeTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
