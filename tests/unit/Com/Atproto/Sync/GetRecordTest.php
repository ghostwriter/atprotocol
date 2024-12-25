<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\GetRecord;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRecord::class)]
final class GetRecordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
