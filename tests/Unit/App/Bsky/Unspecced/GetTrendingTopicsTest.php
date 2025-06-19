<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Unspecced;

use Ghostwriter\AtProtocol\App\Bsky\Unspecced\GetTrendingTopics;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetTrendingTopics::class)]
final class GetTrendingTopicsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
