<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\ResetPassword;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ResetPassword::class)]
final class ResetPasswordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
