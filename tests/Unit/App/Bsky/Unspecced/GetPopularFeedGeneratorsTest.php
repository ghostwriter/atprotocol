<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Unspecced;

use Ghostwriter\AtProtocol\App\Bsky\Unspecced\GetPopularFeedGenerators;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetPopularFeedGenerators::class)]
final class GetPopularFeedGeneratorsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
