<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Value;

use Ghostwriter\AtProtocol\AtProtocol;
use InvalidArgumentException;
use Psr\Http\Message\UriInterface;

use function is_string;

final readonly class Bluesky
{
    public function __construct(
        private PersonalDataServer $personalDataServer
    ) {
    }

    public function atProtocol(): AtProtocol
    {
        return AtProtocol::new($this->personalDataServer->personalDataServer());
    }

    public function personalDataServer(): PersonalDataServer
    {
        return $this->personalDataServer;
    }

    public function resumeSession(SessionData $sessionData): SessionData
    {
        return $sessionData;
    }

    public static function new(PersonalDataServer|string|UriInterface $personalDataServer): self
    {
        return new self(
            match (true) {
                is_string($personalDataServer) => PersonalDataServer::new($personalDataServer),
                $personalDataServer instanceof UriInterface => PersonalDataServer::new(
                    $personalDataServer->__toString()
                ),
                $personalDataServer instanceof PersonalDataServer => $personalDataServer,
                default => throw new InvalidArgumentException('Invalid personal data server'),
            },
        );
    }
}
