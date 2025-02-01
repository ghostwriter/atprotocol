<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetBlocks;
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
