<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetListBlocks;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetListBlocks::class)]
final class GetListBlocksTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
