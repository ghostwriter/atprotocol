<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\DeleteRecord;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeleteRecord::class)]
final class DeleteRecordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
