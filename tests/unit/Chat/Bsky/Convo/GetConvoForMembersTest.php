<?php

declare(strict_types=1);

namespace Tests\Unit\Chat\Bsky\Convo;

use Ghostwriter\AtProtocol\Chat\Bsky\Convo\GetConvoForMembers;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetConvoForMembers::class)]
final class GetConvoForMembersTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
