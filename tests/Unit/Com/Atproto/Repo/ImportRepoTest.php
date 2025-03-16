<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\ImportRepo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ImportRepo::class)]
final class ImportRepoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
