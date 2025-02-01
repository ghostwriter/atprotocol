<?php

declare(strict_types=1);

namespace Tests\Unit\Com\Atproto\Repo;

use Ghostwriter\AtProtocol\Com\Atproto\Repo\UploadBlob;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UploadBlob::class)]
final class UploadBlobTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
