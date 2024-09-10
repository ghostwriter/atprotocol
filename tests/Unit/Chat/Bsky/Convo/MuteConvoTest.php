<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\MuteConvo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MuteConvo::class)]
final class MuteConvoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}