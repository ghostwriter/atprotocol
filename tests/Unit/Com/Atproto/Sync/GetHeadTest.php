<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\GetHead;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetHead::class)]
final class GetHeadTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
