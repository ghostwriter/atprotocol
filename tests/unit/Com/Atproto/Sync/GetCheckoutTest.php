<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\GetCheckout;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetCheckout::class)]
final class GetCheckoutTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
