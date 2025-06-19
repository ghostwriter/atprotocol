<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetActorStarterPacks;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetActorStarterPacks::class)]
final class GetActorStarterPacksTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
