<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Moderation;

use Ghostwriter\AtProtocol\Com\Atproto\Moderation\CreateReport;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreateReport::class)]
final class CreateReportTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
