<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Temp;

use Ghostwriter\AtProtocol\Com\Atproto\Temp\FetchLabels;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FetchLabels::class)]
final class FetchLabelsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
