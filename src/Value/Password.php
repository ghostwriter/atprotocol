<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use InvalidArgumentException;
use Override;
use SensitiveParameter;
use Stringable;

final readonly class Password implements Stringable
{
    public function __construct(
        #[SensitiveParameter]
        private string $password,
    ) {
        if (\mb_strlen($this->password) < 3) {
            throw new InvalidArgumentException('Invalid Password length: ' . $this->password);
        }
    }

    #[Override]
    public function __toString(): string
    {
        return $this->password;
    }
}
