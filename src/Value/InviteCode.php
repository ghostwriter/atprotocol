<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use InvalidArgumentException;
use Override;
use Stringable;

use function preg_match;

final readonly class InviteCode implements Stringable
{
    public function __construct(
        private readonly string $invitecode,
    ) {
        if (! preg_match('#^invitecode:[a-z]+:[a-zA-Z0-9._:%-]*[a-zA-Z0-9._-]$#', $this->invitecode)) {
            throw new InvalidArgumentException('Invalid InviteCode: ' . $this->invitecode);
        }
    }

    #[Override]
    public function __toString(): string
    {
        return $this->invitecode;
    }
}
