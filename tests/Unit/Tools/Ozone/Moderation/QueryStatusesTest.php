<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\QueryStatuses;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(QueryStatuses::class)]
final class QueryStatusesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
