<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\UpdateEmail;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateEmail::class)]
final class UpdateEmailTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
