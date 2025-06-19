<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Set;

use Ghostwriter\AtProtocol\Tools\Ozone\Set\AddValues;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AddValues::class)]
final class AddValuesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
