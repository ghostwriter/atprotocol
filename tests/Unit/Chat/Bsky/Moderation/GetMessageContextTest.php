<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Moderation;

use Ghostwriter\AtProtocol\Chat\Bsky\Moderation\GetMessageContext;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetMessageContext::class)]
final class GetMessageContextTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
