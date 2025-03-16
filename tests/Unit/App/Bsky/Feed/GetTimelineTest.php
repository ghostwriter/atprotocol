<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetTimeline;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetTimeline::class)]
final class GetTimelineTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
