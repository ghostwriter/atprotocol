<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\GetRecords;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRecords::class)]
final class GetRecordsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
