<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Set;

use Ghostwriter\AtProtocol\Tools\Ozone\Set\DeleteSet;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeleteSet::class)]
final class DeleteSetTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
