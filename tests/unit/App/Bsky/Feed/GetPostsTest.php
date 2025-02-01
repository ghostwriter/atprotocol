<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetPosts;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetPosts::class)]
final class GetPostsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
