<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\PutRecord;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PutRecord::class)]
final class PutRecordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
