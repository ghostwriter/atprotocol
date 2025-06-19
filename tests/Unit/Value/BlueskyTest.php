<?php

declare(strict_types=1);

namespace Tests\Unit\Value;

use Ghostwriter\AtProtocol\Value\Bluesky;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Bluesky::class)]
final class BlueskyTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
