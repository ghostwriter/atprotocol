<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetListFeed;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetListFeed::class)]
final class GetListFeedTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
