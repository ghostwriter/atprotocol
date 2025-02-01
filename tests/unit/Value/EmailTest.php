<?php

declare(strict_types=1);

namespace Tests\Unit\Value;

use Ghostwriter\AtProtocol\Value\Email;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Email::class)]
final class EmailTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
