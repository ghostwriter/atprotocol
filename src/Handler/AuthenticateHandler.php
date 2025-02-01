<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Handler;

use Psr\Http\Message\RequestInterface;

final readonly class AuthenticateHandler
{
    public function __construct(
        private string $username,
        private string $password,
    ) {}

    public function __invoke(RequestInterface $request): RequestInterface
    {
        return $request
            ->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withHeader('Accept', 'application/json');
    }
}
