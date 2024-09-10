<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\GetRecord;
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
