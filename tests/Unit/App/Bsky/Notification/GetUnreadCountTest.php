<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Notification;

use Ghostwriter\AtProtocol\App\Bsky\Notification\GetUnreadCount;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetUnreadCount::class)]
final class GetUnreadCountTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
