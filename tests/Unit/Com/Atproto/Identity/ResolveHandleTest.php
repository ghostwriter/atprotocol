<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Identity;

use Ghostwriter\AtProtocol\Com\Atproto\Identity\ResolveHandle;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ResolveHandle::class)]
final class ResolveHandleTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
