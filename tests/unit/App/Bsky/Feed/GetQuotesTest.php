<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Feed;

use Ghostwriter\AtProtocol\App\Bsky\Feed\GetQuotes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetQuotes::class)]
final class GetQuotesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
