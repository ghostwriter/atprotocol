<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\SearchAccounts;
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
