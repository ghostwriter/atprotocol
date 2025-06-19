<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetFeed;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetFeed::class)]
final class GetFeedTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
