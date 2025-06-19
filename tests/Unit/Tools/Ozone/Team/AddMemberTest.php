<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Team;

use Ghostwriter\AtProtocol\Tools\Ozone\Team\AddMember;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AddMember::class)]
final class AddMemberTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
