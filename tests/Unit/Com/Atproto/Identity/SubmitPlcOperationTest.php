<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Identity;

use Ghostwriter\AtProtocol\Com\Atproto\Identity\SubmitPlcOperation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SubmitPlcOperation::class)]
final class SubmitPlcOperationTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
