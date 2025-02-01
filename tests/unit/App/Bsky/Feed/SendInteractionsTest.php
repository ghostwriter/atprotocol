<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\SendInteractions;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SendInteractions::class)]
final class SendInteractionsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
