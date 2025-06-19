<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\RequestEmailUpdate;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RequestEmailUpdate::class)]
final class RequestEmailUpdateTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
