<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\QueryEvents;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(QueryEvents::class)]
final class QueryEventsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
