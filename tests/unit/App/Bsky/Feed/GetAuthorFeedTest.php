<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetAuthorFeed;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetAuthorFeed::class)]
final class GetAuthorFeedTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
