<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Signature;

use Ghostwriter\AtProtocol\Tools\Ozone\Signature\FindRelatedAccounts;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FindRelatedAccounts::class)]
final class FindRelatedAccountsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
