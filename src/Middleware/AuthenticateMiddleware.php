<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Middleware;

use Psr\Http\Message\RequestInterface;

final readonly class AuthenticateMiddleware
{
    public function __construct(
        private readonly string $username,
        private readonly string $password,
    ) {
    }

    public function __invoke(RequestInterface $request): RequestInterface
    {
        return $request
            ->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withHeader('Accept', 'application/json');
    }
}
