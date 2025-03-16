<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Setting;

use Ghostwriter\AtProtocol\Tools\Ozone\Setting\RemoveOptions;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RemoveOptions::class)]
final class RemoveOptionsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
