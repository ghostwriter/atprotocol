<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\CheckAccountStatus;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CheckAccountStatus::class)]
final class CheckAccountStatusTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
