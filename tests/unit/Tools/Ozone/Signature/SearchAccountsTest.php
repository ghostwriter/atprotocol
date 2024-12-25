<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Signature;

use Ghostwriter\AtProtocol\Tools\Ozone\Signature\SearchAccounts;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SearchAccounts::class)]
final class SearchAccountsTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
