<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Unspecced;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * An unspecced view of globally popular feed generators.
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\App\Bsky\Unspecced\GetPopularFeedGeneratorsTest
 */
final readonly class GetPopularFeedGenerators
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $query = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.unspecced.getPopularFeedGenerators')
                    ->withQuery(http_build_query(array_filter([
                        'limit' => $limit,
                        'cursor' => $cursor,
                        'query' => $query,
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
