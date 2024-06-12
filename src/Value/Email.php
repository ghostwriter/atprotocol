<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use InvalidArgumentException;
use Override;
use Stringable;

use const FILTER_VALIDATE_EMAIL;

use function filter_var;

final readonly class Email implements Stringable
{
    public function __construct(
        private readonly string $email,
    ) {
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid Email: ' . $this->email);
        }
    }

    #[Override]
    public function __toString(): string
    {
        return $this->email;
    }
}
