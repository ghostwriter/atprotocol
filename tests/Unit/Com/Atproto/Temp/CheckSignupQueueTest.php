<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Temp;

use Ghostwriter\AtProtocol\Com\Atproto\Temp\CheckSignupQueue;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CheckSignupQueue::class)]
final class CheckSignupQueueTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
