<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetSuggestedFollowsByActor;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetSuggestedFollowsByActor::class)]
final class GetSuggestedFollowsByActorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}