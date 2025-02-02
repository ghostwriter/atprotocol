<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\SearchStarterPacks;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SearchStarterPacks::class)]
final class SearchStarterPacksTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
