<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\RevokeAppPassword;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RevokeAppPassword::class)]
final class RevokeAppPasswordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
