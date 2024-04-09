<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Actor;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get detailed profile view of an actor. Does not require auth, but contains relevant metadata with auth.
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\App\Bsky\Actor\GetProfileTest
 */
final readonly class GetProfile
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(UriInterface $pdsUri, string $actor = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.actor.getProfile')
                    ->withQuery(http_build_query(array_filter([
                        'actor' => $actor,
                    ])))
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $request;
    }
}
