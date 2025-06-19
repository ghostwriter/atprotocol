<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Actor;

use Ghostwriter\AtProtocol\App\Bsky\Actor\GetProfiles;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetProfiles::class)]
final class GetProfilesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
