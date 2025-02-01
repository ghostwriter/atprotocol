<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\ListConvos;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListConvos::class)]
final class ListConvosTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
