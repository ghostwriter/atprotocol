<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Unspecced;

use Ghostwriter\AtProtocol\App\Bsky\Unspecced\SearchPostsSkeleton;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SearchPostsSkeleton::class)]
final class SearchPostsSkeletonTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
