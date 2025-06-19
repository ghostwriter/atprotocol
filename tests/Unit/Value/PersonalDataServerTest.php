<?php

declare(strict_types=1);

namespace Tests\Unit\Value;

use Ghostwriter\AtProtocol\Value\PersonalDataServer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PersonalDataServer::class)]
final class PersonalDataServerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
