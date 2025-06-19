<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\DescribeRepo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DescribeRepo::class)]
final class DescribeRepoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
