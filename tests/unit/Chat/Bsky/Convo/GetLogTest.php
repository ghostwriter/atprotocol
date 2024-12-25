<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\GetLog;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetLog::class)]
final class GetLogTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
