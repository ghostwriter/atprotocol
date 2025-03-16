<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Server;

use Ghostwriter\AtProtocol\Tools\Ozone\Server\GetConfig;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetConfig::class)]
final class GetConfigTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
