<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\MuteActor;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MuteActor::class)]
final class MuteActorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
