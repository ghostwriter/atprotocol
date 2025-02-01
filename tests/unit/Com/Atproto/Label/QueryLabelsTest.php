<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Label;

use Ghostwriter\AtProtocol\Com\Atproto\Label\QueryLabels;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(QueryLabels::class)]
final class QueryLabelsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
