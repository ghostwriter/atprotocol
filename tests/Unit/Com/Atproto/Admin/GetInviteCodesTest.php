<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\GetInviteCodes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetInviteCodes::class)]
final class GetInviteCodesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
