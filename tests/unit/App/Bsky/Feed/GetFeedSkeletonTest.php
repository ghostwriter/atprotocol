<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetFeedSkeleton;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetFeedSkeleton::class)]
final class GetFeedSkeletonTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
