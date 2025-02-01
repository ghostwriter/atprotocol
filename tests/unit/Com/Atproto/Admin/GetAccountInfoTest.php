<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\GetAccountInfo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetAccountInfo::class)]
final class GetAccountInfoTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
