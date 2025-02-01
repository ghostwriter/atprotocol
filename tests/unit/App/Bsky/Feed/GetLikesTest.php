<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetLikes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetLikes::class)]
final class GetLikesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
