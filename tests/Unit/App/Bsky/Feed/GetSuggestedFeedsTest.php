<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetSuggestedFeeds;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetSuggestedFeeds::class)]
final class GetSuggestedFeedsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
