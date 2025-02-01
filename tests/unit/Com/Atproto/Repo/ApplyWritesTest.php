<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\ApplyWrites;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ApplyWrites::class)]
final class ApplyWritesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
