<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\AtProtocol\AtProtocol;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AtProtocol::class)]
final class AtProtocolTest extends TestCase
{
    public function testAtProtocol(): void
    {
        self::assertInstanceOf(AtProtocol::class, AtProtocol::new('https://bsky.social'));
    }
}
