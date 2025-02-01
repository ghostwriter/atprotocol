<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Actor;

use Ghostwriter\AtProtocol\Chat\Bsky\Actor\ExportAccountData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ExportAccountData::class)]
final class ExportAccountDataTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
