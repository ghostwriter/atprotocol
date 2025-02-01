<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Unspecced;

use Ghostwriter\AtProtocol\App\Bsky\Unspecced\SearchStarterPacksSkeleton;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SearchStarterPacksSkeleton::class)]
final class SearchStarterPacksSkeletonTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
