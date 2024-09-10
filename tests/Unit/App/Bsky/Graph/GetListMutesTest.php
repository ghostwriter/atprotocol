<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetListMutes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetListMutes::class)]
final class GetListMutesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}