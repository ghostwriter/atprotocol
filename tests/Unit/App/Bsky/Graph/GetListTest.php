<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\GetList;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetList::class)]
final class GetListTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
