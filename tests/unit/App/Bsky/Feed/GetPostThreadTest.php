<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetPostThread;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetPostThread::class)]
final class GetPostThreadTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
