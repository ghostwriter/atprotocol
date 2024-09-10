<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\CreateAccount;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreateAccount::class)]
final class CreateAccountTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
