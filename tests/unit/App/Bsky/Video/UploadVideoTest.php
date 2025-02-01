<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Video;

use Ghostwriter\AtProtocol\App\Bsky\Video\UploadVideo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UploadVideo::class)]
final class UploadVideoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
