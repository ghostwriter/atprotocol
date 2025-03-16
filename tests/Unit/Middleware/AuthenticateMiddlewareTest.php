<?php

declare(strict_types=1);

namespace Tests\Unit\Middleware;

use Ghostwriter\AtProtocol\Middleware\AuthenticateMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AuthenticateMiddleware::class)]
final class AuthenticateMiddlewareTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
