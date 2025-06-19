<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Notification;

use Ghostwriter\AtProtocol\App\Bsky\Notification\ListNotifications;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListNotifications::class)]
final class ListNotificationsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
