<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\ListRepos;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListRepos::class)]
final class ListReposTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
