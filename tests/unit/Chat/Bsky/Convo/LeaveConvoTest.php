<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\LeaveConvo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LeaveConvo::class)]
final class LeaveConvoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
