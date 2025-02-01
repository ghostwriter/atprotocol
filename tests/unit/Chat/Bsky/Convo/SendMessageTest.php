<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\SendMessage;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SendMessage::class)]
final class SendMessageTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
