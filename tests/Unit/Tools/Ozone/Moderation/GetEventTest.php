<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\GetEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetEvent::class)]
final class GetEventTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
