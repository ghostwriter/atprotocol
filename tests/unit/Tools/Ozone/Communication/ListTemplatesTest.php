<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Communication;

use Ghostwriter\AtProtocol\Tools\Ozone\Communication\ListTemplates;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ListTemplates::class)]
final class ListTemplatesTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
