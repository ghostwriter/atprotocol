<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\ListBlobs;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListBlobs::class)]
final class ListBlobsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
