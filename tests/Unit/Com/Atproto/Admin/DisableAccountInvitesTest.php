<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\DisableAccountInvites;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DisableAccountInvites::class)]
final class DisableAccountInvitesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
