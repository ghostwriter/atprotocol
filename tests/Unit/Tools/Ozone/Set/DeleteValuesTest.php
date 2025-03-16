<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Set;

use Ghostwriter\AtProtocol\Tools\Ozone\Set\DeleteValues;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeleteValues::class)]
final class DeleteValuesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
