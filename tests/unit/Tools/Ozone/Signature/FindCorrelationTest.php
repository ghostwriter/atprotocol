<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Signature;

use Ghostwriter\AtProtocol\Tools\Ozone\Signature\FindCorrelation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FindCorrelation::class)]
final class FindCorrelationTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
