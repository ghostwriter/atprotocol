<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Server;

use Ghostwriter\AtProtocol\Com\Atproto\Server\CreateAppPassword;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreateAppPassword::class)]
final class CreateAppPasswordTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
