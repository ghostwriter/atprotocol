<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Notification;

use Ghostwriter\AtProtocol\App\Bsky\Notification\UpdateSeen;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateSeen::class)]
final class UpdateSeenTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
