<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetStarterPacks;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetStarterPacks::class)]
final class GetStarterPacksTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
