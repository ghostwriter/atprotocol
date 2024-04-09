<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tests\Unit\Value;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Ghostwriter\AtProtocol\Value\Handle;
use InvalidArgumentException;

#[CoversClass(Handle::class)]
final class HandleTest extends TestCase
{
    public static function validSyntaxHandleDataProvider(): Generator
    {
        // Test data copied from https://atproto.com/specs/handle
        // Copyright (c) 2023 Bluesky, PBC.
        $handles = [
            '2gzyxa5ihm7nsggfxnu52rck2vv4rvmdlkiu3zzui5du4xyclen53wid.onion',
            'laptop.local',
            'blah.arpa',
            // not a real TLD, but syntax ok
            'name.t--t',
            'example.t',
        ];

        foreach ($handles as $handle) {
            yield $handle => [$handle];
        }
    }

    public static function validHandleDataProvider(): Generator
    {
        // Test data copied from https://atproto.com/specs/handle
        // Copyright (c) 2023 Bluesky, PBC.
        $handles = [
            'codepoet.bsky.social',
            '8.cn',
            'XX.LCS.MIT.EDU',
            'a.co',
            'xn--notarealidn.com',
            'xn--fiqa61au8b7zsevnm8ak20mc4a87e.xn--fiqs8s',
            'xn--ls8h.test',
        ];

        foreach ($handles as $handle) {
            yield $handle => [$handle];
        }
    }

    public static function invalidHandleDataProvider(): Generator
    {
        // Test data copied from https://atproto.com/specs/handle
        // Copyright (c) 2023 Bluesky, PBC.
        $handles = [
            'jo@hn.test',
            '💩.test',
            'john..test',
            'xn--bcher-.tld',
            'john.0',
            'cn.8',
            'www.masełkowski.pl.com',
            'org',
            'name.org.',
        ];

        foreach ($handles as $handle) {
            yield $handle => [$handle];
        }
    }

    #[DataProvider('validSyntaxHandleDataProvider')]
    public function testValidSyntaxHandle(string $handle): void
    {
        self::assertSame($handle, (string) new Handle($handle));
    }

    #[DataProvider('validHandleDataProvider')]
    public function testValidHandle(string $handle): void
    {
        self::assertSame($handle, (string) new Handle($handle));
    }

    #[DataProvider('invalidHandleDataProvider')]
    public function testInvalidHandle(string $handle): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Handle($handle);
    }
}
