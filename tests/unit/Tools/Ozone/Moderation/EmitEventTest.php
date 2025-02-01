<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\EmitEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(EmitEvent::class)]
final class EmitEventTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
