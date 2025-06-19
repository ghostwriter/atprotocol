<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Unspecced;

use Ghostwriter\AtProtocol\App\Bsky\Unspecced\GetConfig;
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
