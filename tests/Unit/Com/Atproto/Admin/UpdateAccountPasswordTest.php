<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\UpdateAccountPassword;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateAccountPassword::class)]
final class UpdateAccountPasswordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
