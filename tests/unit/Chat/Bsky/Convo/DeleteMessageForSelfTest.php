<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\DeleteMessageForSelf;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeleteMessageForSelf::class)]
final class DeleteMessageForSelfTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
