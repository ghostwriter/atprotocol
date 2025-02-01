<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Actor;

use Ghostwriter\AtProtocol\App\Bsky\Actor\SearchActors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SearchActors::class)]
final class SearchActorsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
