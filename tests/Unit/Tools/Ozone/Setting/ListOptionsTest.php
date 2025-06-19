<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Setting;

use Ghostwriter\AtProtocol\Tools\Ozone\Setting\ListOptions;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListOptions::class)]
final class ListOptionsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
