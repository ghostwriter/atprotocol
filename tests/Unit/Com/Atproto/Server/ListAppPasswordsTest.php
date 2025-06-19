<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\ListAppPasswords;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListAppPasswords::class)]
final class ListAppPasswordsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
