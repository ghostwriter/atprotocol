<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use InvalidArgumentException;
use Override;
use Stringable;

use function preg_match;

final readonly class Handle implements Stringable
{
    public function __construct(
        private readonly string $handle,
    ) {
        if (
            preg_match(
                '#^([a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?$#',
                $this->handle
            ) === 0 || preg_match(
                '#^([a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?$#',
                $this->handle
            ) === false
        ) {
            throw new InvalidArgumentException('Invalid handle: ' . $this->handle);
        }
    }

    #[Override]
    public function __toString(): string
    {
        return $this->handle;
    }
}
