<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Identity;

use Ghostwriter\AtProtocol\Com\Atproto\Identity\GetRecommendedDidCredentials;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRecommendedDidCredentials::class)]
final class GetRecommendedDidCredentialsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
