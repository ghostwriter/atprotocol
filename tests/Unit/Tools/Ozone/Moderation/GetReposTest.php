<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\GetRepos;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRepos::class)]
final class GetReposTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
