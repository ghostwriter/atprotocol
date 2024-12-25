<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Set;

use Ghostwriter\AtProtocol\Tools\Ozone\Set\UpsertSet;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpsertSet::class)]
final class UpsertSetTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
