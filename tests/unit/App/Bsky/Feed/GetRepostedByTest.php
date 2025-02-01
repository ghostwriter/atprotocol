<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetRepostedBy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRepostedBy::class)]
final class GetRepostedByTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
