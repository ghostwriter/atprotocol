<?php

declare(strict_types=1);

namespace Tests\Unit\Value;

use Ghostwriter\AtProtocol\Value\Password;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Password::class)]
final class PasswordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
