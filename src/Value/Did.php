<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use InvalidArgumentException;
use JsonSerializable;
use Override;
use Stringable;

use function preg_match;

final readonly class Did implements JsonSerializable, Stringable
{
    public function __construct(
        private string $did,
    ) {
        // should we split the value into parts and validate each part?
        // and store the parts in the object
        if (
            ! preg_match('#^did:[a-z]+:[a-zA-Z0-9._:%-]*[a-zA-Z0-9._-]$#', $this->did)
        ) {
            // Todo: create custom exception
            throw new InvalidArgumentException('Invalid DID: ' . $this->did);
        }
    }

    #[Override]
    public function __toString(): string
    {
        return $this->did;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return [
            'did' => $this->did,
        ];
    }
}
