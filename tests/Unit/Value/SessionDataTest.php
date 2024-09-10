<?php

declare(strict_types=1);

namespace Tests\Unit\Value;

use Ghostwriter\AtProtocol\Value\SessionData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SessionData::class)]
final class SessionDataTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
