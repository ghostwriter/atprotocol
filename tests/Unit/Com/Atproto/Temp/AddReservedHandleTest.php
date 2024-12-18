<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Temp;

use Ghostwriter\AtProtocol\Com\Atproto\Temp\AddReservedHandle;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AddReservedHandle::class)]
final class AddReservedHandleTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
