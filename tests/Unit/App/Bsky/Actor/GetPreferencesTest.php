<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Actor;

use Ghostwriter\AtProtocol\App\Bsky\Actor\GetPreferences;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetPreferences::class)]
final class GetPreferencesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
