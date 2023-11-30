<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Unspecced;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Backend Posts search, returns only skeleton
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\App\Bsky\Unspecced\SearchPostsSkeletonTest
 */
final readonly class SearchPostsSkeleton
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        string $q = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.unspecced.searchPostsSkeleton')
                    ->withQuery(http_build_query(array_filter([
                    'q' => $q,
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
