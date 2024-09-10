<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\GetBlob;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetBlob::class)]
final class GetBlobTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
