<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\ConfirmEmail;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ConfirmEmail::class)]
final class ConfirmEmailTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}