<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Team;

use Ghostwriter\AtProtocol\Tools\Ozone\Team\UpdateMember;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateMember::class)]
final class UpdateMemberTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
