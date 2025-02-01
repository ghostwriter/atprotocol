<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Temp;

use Ghostwriter\AtProtocol\Com\Atproto\Temp\RequestPhoneVerification;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RequestPhoneVerification::class)]
final class RequestPhoneVerificationTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
