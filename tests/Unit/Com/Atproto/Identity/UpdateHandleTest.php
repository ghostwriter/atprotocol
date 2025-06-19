<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Identity;

use Ghostwriter\AtProtocol\Com\Atproto\Identity\UpdateHandle;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateHandle::class)]
final class UpdateHandleTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
