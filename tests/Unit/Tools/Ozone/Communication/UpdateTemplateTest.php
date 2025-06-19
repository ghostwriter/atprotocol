<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Communication;

use Ghostwriter\AtProtocol\Tools\Ozone\Communication\UpdateTemplate;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateTemplate::class)]
final class UpdateTemplateTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
