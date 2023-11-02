<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\Tests\Unit;

use Ghostwriter\Wip\Foo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Foo::class)]
final class FooTest extends TestCase
{
    public function test(): void
    {
        self::assertTrue((new Foo())->test());
    }
}
