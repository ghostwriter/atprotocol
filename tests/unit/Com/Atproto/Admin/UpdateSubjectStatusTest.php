<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Admin;

use Ghostwriter\AtProtocol\Com\Atproto\Admin\UpdateSubjectStatus;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateSubjectStatus::class)]
final class UpdateSubjectStatusTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
