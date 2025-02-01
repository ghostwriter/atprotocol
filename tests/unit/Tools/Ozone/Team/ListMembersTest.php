<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Team;

use Ghostwriter\AtProtocol\Tools\Ozone\Team\ListMembers;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListMembers::class)]
final class ListMembersTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
