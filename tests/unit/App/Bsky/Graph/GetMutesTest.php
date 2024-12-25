<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetMutes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetMutes::class)]
final class GetMutesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
