<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetActorLikes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetActorLikes::class)]
final class GetActorLikesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
