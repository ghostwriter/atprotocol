<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetFeedGenerators;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetFeedGenerators::class)]
final class GetFeedGeneratorsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
