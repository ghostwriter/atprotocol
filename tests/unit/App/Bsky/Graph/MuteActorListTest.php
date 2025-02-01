<?php

declare(strict_types=1);

namespace Tests\Unit\App\Bsky\Graph;

use Ghostwriter\AtProtocol\App\Bsky\Graph\MuteActorList;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MuteActorList::class)]
final class MuteActorListTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
