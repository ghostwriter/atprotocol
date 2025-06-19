<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\RequestAccountDelete;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RequestAccountDelete::class)]
final class RequestAccountDeleteTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
