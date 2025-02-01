<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Actor;

use Ghostwriter\AtProtocol\App\Bsky\Actor\GetProfile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetProfile::class)]
final class GetProfileTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
