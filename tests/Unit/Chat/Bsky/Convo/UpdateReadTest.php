<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\UpdateRead;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateRead::class)]
final class UpdateReadTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
