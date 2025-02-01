<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\UnmuteActor;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UnmuteActor::class)]
final class UnmuteActorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
