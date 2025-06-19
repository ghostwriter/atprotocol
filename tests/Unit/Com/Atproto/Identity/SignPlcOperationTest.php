<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Identity;

use Ghostwriter\AtProtocol\Com\Atproto\Identity\SignPlcOperation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SignPlcOperation::class)]
final class SignPlcOperationTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
