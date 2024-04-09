<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tests\Unit;

use Ghostwriter\AtProtocol\AtProtocol;
use Ghostwriter\AtProtocol\Com\Atproto\Server\CreateSession;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AtProtocol::class)]
#[UsesClass(CreateSession::class)]
final class AtProtocolTest extends TestCase
{
    public function testAtProtocol(): void
    {
        self::assertInstanceOf(AtProtocol::class, AtProtocol::new('https://bsky.social'));
    }
}
