<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use Laminas\Diactoros\UriFactory;
use Psr\Http\Message\UriInterface;

final readonly class PersonalDataServer
{
    public function __construct(
        private UriInterface $uri
    ) {}

    public static function new(string $personalDataServer): self
    {
        return new self((new UriFactory())->createUri($personalDataServer));
    }

    public function toString(): string
    {
        return $this->uri->__toString();
    }
}
