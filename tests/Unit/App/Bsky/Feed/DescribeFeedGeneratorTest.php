<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\DescribeFeedGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DescribeFeedGenerator::class)]
final class DescribeFeedGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
