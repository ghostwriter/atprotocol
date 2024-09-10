<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Labeler;

use Ghostwriter\AtProtocol\App\Bsky\Labeler\GetServices;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetServices::class)]
final class GetServicesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
