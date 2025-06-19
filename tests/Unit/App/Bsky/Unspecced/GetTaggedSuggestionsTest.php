<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Unspecced;

use Ghostwriter\AtProtocol\App\Bsky\Unspecced\GetTaggedSuggestions;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetTaggedSuggestions::class)]
final class GetTaggedSuggestionsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
