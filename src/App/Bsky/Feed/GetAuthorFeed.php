<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Feed;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get a view of an actor's 'author feed' (post and reposts by the author). Does not require auth.
 *
 * @see GetAuthorFeedTest
 */
final readonly class GetAuthorFeed
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $actor = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $filter = null,
        ?bool $includePins = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.feed.getAuthorFeed')
                    ->withQuery(http_build_query(array_filter([
                        'actor' => $actor,
                        'limit' => $limit,
                        'cursor' => $cursor,
                        'filter' => $filter,
                        'includePins' => $includePins,
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
