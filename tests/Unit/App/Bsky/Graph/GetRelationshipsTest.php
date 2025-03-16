<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetRelationships;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRelationships::class)]
final class GetRelationshipsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
