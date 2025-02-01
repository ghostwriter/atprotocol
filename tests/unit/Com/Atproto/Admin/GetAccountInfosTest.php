<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\GetAccountInfos;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetAccountInfos::class)]
final class GetAccountInfosTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
