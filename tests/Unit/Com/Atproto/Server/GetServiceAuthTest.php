<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\GetServiceAuth;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetServiceAuth::class)]
final class GetServiceAuthTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
