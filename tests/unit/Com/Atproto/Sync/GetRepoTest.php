<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\GetRepo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRepo::class)]
final class GetRepoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
