<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\ListMissingBlobs;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListMissingBlobs::class)]
final class ListMissingBlobsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
