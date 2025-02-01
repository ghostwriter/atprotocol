<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\DisableInviteCodes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DisableInviteCodes::class)]
final class DisableInviteCodesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
