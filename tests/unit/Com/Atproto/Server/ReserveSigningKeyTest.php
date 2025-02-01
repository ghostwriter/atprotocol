<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\ReserveSigningKey;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ReserveSigningKey::class)]
final class ReserveSigningKeyTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
