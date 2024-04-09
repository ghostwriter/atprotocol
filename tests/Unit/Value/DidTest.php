<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tests\Unit\Value;

use Generator;
use Ghostwriter\AtProtocol\Value\Did;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

use function json_encode;

use const JSON_THROW_ON_ERROR;

#[CoversClass(Did::class)]
final class DidTest extends TestCase
{
    public static function validDidDataProvider(): Generator
    {
        // Test data copied from https://atproto.com/specs/did
        // Copyright (c) 2023 Bluesky, PBC.
        $dids = [
            'did:plc:z72i7hdynmk6r22z27h6tvur',
            'did:web:blueskyweb.xyz',
            'did:method:val:two',
            'did:m:v',
            'did:method::::val',
            'did:method:-:_:.',
            'did:key:zQ3shZc2QzApp2oymGvQbzP8eKheVshBHbU4ZYjeXqwSKEn6N',
        ];

        foreach ($dids as $did) {
            yield $did => [$did];
        }
    }

    public static function invalidDidDataProvider(): Generator
    {
        // Test data copied from https://atproto.com/specs/did
        // Copyright (c) 2023 Bluesky, PBC.
        $dids = [
            'did:METHOD:val',
            'did:m123:val',
            'DID:method:val',
            'did:method:',
            'did:method:val/two',
            'did:method:val?two',
            'did:method:val#two',
        ];

        foreach ($dids as $did) {
            yield $did => [$did];
        }
    }

    #[DataProvider('validDidDataProvider')]
    public function testValidDid(string $did): void
    {
        $sut = new Did($did);

        self::assertSame($did, (string) $sut);

        self::assertSame(
            json_encode([
                'did' => $did,
            ], JSON_THROW_ON_ERROR),
            json_encode($sut, JSON_THROW_ON_ERROR)
        );
    }

    #[DataProvider('invalidDidDataProvider')]
    public function testInvalidDid(string $did): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Did($did);
    }
}
