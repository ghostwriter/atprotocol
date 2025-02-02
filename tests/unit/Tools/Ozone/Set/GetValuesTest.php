<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Set;

use Ghostwriter\AtProtocol\Tools\Ozone\Set\GetValues;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetValues::class)]
final class GetValuesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
