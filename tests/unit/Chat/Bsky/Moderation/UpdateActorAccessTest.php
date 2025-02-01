<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Moderation;

use Ghostwriter\AtProtocol\Chat\Bsky\Moderation\UpdateActorAccess;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateActorAccess::class)]
final class UpdateActorAccessTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
