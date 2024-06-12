<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Unspecced;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Backend Posts search, returns only skeleton.
 *
 * @see \Tests\Unit\App\Bsky\Unspecced\SearchPostsSkeletonTest
 */
final readonly class SearchPostsSkeleton
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        string $q = null,
        ?string $sort = null,
        ?string $since = null,
        ?string $until = null,
        ?string $mentions = null,
        ?string $author = null,
        ?string $lang = null,
        ?string $domain = null,
        ?string $url = null,
        ?array $tag = null,
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.unspecced.searchPostsSkeleton')
                    ->withQuery(http_build_query(array_filter([
                        'q' => $q,
                        'sort' => $sort,
                        'since' => $since,
                        'until' => $until,
                        'mentions' => $mentions,
                        'author' => $author,
                        'lang' => $lang,
                        'domain' => $domain,
                        'url' => $url,
                        'tag' => $tag,
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
