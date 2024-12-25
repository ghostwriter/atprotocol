<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Moderation;

use Ghostwriter\AtProtocol\Chat\Bsky\Moderation\GetActorMetadata;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetActorMetadata::class)]
final class GetActorMetadataTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
