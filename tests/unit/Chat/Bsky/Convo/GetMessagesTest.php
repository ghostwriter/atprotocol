<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\GetMessages;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetMessages::class)]
final class GetMessagesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
