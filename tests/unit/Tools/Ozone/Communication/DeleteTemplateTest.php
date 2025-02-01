<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Communication;

use Ghostwriter\AtProtocol\Tools\Ozone\Communication\DeleteTemplate;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeleteTemplate::class)]
final class DeleteTemplateTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
