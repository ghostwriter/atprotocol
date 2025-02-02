<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Unspecced;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Backend Starter Pack search, returns only skeleton.
 *
 * @see SearchStarterPacksSkeletonTest
 */
final readonly class SearchStarterPacksSkeleton
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $q = null,
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.unspecced.searchStarterPacksSkeleton')
                    ->withQuery(http_build_query(array_filter([
                        'q' => $q,
                        'viewer' => $viewer,
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
