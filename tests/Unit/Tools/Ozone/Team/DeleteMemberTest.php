<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Team;

use Ghostwriter\AtProtocol\Tools\Ozone\Team\DeleteMember;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeleteMember::class)]
final class DeleteMemberTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
