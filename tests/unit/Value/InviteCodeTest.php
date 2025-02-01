<?php

declare(strict_types=1);

namespace Tests\Unit\Value;

use Ghostwriter\AtProtocol\Value\InviteCode;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(InviteCode::class)]
final class InviteCodeTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
