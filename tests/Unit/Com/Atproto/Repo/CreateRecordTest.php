<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\CreateRecord;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreateRecord::class)]
final class CreateRecordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
