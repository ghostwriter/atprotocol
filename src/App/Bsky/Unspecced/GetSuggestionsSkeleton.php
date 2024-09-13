<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Unspecced;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get a skeleton of suggested actors. Intended to be called and then hydrated through app.bsky.actor.getSuggestions.
 *
 * @see GetSuggestionsSkeletonTest
 */
final readonly class GetSuggestionsSkeleton
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $relativeToDid = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.unspecced.getSuggestionsSkeleton')
                    ->withQuery(\http_build_query(\array_filter([
                        'viewer' => $viewer,
                        'limit' => $limit,
                        'cursor' => $cursor,
                        'relativeToDid' => $relativeToDid,
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
