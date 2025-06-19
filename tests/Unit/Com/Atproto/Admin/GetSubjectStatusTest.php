<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\GetSubjectStatus;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetSubjectStatus::class)]
final class GetSubjectStatusTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
