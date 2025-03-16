<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\AtProtocol\Exception\ShouldNotHappenException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ShouldNotHappenException::class)]
final class ShouldNotHappenExceptionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
