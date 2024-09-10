<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\GetRepoStatus;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRepoStatus::class)]
final class GetRepoStatusTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
