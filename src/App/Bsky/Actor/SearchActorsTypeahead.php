<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Actor;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Find actor suggestions for a search term.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\App\Bsky\Actor\SearchActorsTypeaheadTest
 */
final readonly class SearchActorsTypeahead
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        ?string $q = null,
        ?int $limit = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/app.bsky.actor.searchActorsTypeahead')
                    ->withQuery(http_build_query(array_filter([
                    'q' => $q,
                    'limit' => $limit,
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
