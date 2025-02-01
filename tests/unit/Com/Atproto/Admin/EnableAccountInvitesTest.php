<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\EnableAccountInvites;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(EnableAccountInvites::class)]
final class EnableAccountInvitesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
