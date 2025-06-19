<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\RequestEmailConfirmation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RequestEmailConfirmation::class)]
final class RequestEmailConfirmationTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
