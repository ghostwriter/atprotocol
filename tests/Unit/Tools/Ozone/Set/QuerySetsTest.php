<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Set;

use Ghostwriter\AtProtocol\Tools\Ozone\Set\QuerySets;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(QuerySets::class)]
final class QuerySetsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
