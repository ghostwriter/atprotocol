<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\SearchPosts;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SearchPosts::class)]
final class SearchPostsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
