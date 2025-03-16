<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetActorFeeds;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetActorFeeds::class)]
final class GetActorFeedsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
