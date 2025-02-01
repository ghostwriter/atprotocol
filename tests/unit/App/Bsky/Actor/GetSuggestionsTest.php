<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Actor;

use Ghostwriter\AtProtocol\App\Bsky\Actor\GetSuggestions;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetSuggestions::class)]
final class GetSuggestionsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
