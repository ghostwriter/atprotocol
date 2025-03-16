<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\CreateInviteCodes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreateInviteCodes::class)]
final class CreateInviteCodesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
