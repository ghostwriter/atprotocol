<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\DeactivateAccount;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeactivateAccount::class)]
final class DeactivateAccountTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
