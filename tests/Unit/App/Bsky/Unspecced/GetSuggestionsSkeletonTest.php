<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Unspecced;

use Ghostwriter\AtProtocol\App\Bsky\Unspecced\GetSuggestionsSkeleton;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetSuggestionsSkeleton::class)]
final class GetSuggestionsSkeletonTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
