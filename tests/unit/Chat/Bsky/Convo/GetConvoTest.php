<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\GetConvo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetConvo::class)]
final class GetConvoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
