<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\ListRecords;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListRecords::class)]
final class ListRecordsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
