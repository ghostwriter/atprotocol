<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\RequestCrawl;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RequestCrawl::class)]
final class RequestCrawlTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
