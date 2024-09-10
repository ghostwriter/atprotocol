<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\RequestPasswordReset;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RequestPasswordReset::class)]
final class RequestPasswordResetTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}