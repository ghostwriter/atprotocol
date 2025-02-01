<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Sync;

use Ghostwriter\AtProtocol\Com\Atproto\Sync\NotifyOfUpdate;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(NotifyOfUpdate::class)]
final class NotifyOfUpdateTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
