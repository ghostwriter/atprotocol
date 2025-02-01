<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\GetAccountInviteCodes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetAccountInviteCodes::class)]
final class GetAccountInviteCodesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
