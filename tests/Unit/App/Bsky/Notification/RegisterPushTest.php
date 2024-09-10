<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Notification;

use Ghostwriter\AtProtocol\App\Bsky\Notification\RegisterPush;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RegisterPush::class)]
final class RegisterPushTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
