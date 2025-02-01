<?php

declare(strict_types=1);

namespace Tests\Unit\Handler;

use Ghostwriter\AtProtocol\Handler\AuthenticateHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AuthenticateHandler::class)]
final class AuthenticateHandlerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
