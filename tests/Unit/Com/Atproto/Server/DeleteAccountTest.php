<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\DeleteAccount;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeleteAccount::class)]
final class DeleteAccountTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}