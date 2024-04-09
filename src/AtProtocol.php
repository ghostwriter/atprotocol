<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol;

use Ghostwriter\AtProtocol\Trait\HttpTrait;
use Psr\Http\Message\ResponseInterface;

/** @see AtProtocolTest */
final class AtProtocol
{
    use HttpTrait;

    public function createSession(string $username, string $password): ResponseInterface
    {
        // replace this block of code with a separate class
        return $this->httpClient->sendRequest(($this->createSession)($username, $password));
    }
}
