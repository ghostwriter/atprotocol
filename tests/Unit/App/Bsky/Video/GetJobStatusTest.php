<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Video;

use Ghostwriter\AtProtocol\App\Bsky\Video\GetJobStatus;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetJobStatus::class)]
final class GetJobStatusTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
