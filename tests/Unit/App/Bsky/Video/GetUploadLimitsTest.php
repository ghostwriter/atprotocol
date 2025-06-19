<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Video;

use Ghostwriter\AtProtocol\App\Bsky\Video\GetUploadLimits;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetUploadLimits::class)]
final class GetUploadLimitsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
