<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\GetBlocks;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetBlocks::class)]
final class GetBlocksTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
