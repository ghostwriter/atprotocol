<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\GetRecord;
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
