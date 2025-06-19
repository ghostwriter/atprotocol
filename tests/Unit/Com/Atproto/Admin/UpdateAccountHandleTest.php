<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\UpdateAccountHandle;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateAccountHandle::class)]
final class UpdateAccountHandleTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
