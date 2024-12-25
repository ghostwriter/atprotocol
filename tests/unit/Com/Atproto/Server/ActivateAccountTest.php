<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\ActivateAccount;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ActivateAccount::class)]
final class ActivateAccountTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
