<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\GetRepo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRepo::class)]
final class GetRepoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
