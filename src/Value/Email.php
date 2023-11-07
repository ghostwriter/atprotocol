<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use Stringable;
use InvalidArgumentException;

final readonly class Email implements Stringable
{
    public function __construct(
        private readonly string $email,
    ) {
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                'Invalid Email: ' . $this->email
            );
        }
    }

    public function __toString(): string {
        return $this->email;
    }
}
