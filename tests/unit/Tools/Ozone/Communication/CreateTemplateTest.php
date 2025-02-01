<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Communication;

use Ghostwriter\AtProtocol\Tools\Ozone\Communication\CreateTemplate;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreateTemplate::class)]
final class CreateTemplateTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
