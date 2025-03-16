<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\UpdateAccountEmail;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateAccountEmail::class)]
final class UpdateAccountEmailTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
