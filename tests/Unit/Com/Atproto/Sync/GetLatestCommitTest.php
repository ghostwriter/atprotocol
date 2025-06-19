<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\GetLatestCommit;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetLatestCommit::class)]
final class GetLatestCommitTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
