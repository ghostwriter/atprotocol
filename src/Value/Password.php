<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use Stringable;
use InvalidArgumentException;

final readonly class Password implements Stringable
{
    public function __construct(
        private readonly string $password,
    ) {
        if (mb_strlen($this->password) < 3) {
            throw new InvalidArgumentException(
                'Invalid Password length: ' . $this->password
            );
        }
    }

    public function __toString(): string {
        return $this->password;
    }
}
