<?php

declare(strict_types=1);

namespace Tests\Unit\Tools\Ozone\Moderation;

use Ghostwriter\AtProtocol\Tools\Ozone\Moderation\SearchRepos;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SearchRepos::class)]
final class SearchReposTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
