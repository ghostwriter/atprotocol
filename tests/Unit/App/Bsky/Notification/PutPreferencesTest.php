<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Notification;

use Ghostwriter\AtProtocol\App\Bsky\Notification\PutPreferences;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PutPreferences::class)]
final class PutPreferencesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
