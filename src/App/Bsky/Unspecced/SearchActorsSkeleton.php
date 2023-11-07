<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Unspecced;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Backend Actors (profile) search, returning only skeleton
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\App\Bsky\Unspecced\SearchActorsSkeletonTest
 */
final readonly class SearchActorsSkeleton
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        string $q = null,
        ?bool $typeahead = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/app.bsky.unspecced.searchActorsSkeleton')
                    ->withQuery(http_build_query(array_filter([
                    'q' => $q,
                    'typeahead' => $typeahead,
                    'limit' => $limit,
                    'cursor' => $cursor,
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
