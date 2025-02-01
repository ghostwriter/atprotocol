<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetLists;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetLists::class)]
final class GetListsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
