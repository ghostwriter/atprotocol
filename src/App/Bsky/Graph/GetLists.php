<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Graph;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Fetch a list of lists that belong to an actor
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\App\Bsky\Graph\GetListsTest
 */
final readonly class GetLists
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        string $actor = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/app.bsky.graph.getLists')
                    ->withQuery(http_build_query(array_filter([
                    'actor' => $actor,
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
