<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\SendEmail;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SendEmail::class)]
final class SendEmailTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
