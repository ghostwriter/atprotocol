<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\UnmuteConvo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UnmuteConvo::class)]
final class UnmuteConvoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
