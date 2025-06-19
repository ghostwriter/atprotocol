<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Identity;

use Ghostwriter\AtProtocol\Com\Atproto\Identity\RequestPlcOperationSignature;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RequestPlcOperationSignature::class)]
final class RequestPlcOperationSignatureTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
