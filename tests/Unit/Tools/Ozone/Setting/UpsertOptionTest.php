<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Setting;

use Ghostwriter\AtProtocol\Tools\Ozone\Setting\UpsertOption;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpsertOption::class)]
final class UpsertOptionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
