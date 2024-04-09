<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Feed;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get information about a feed generator. Implemented by AppView.
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\App\Bsky\Feed\GetFeedGeneratorTest
 */
final readonly class GetFeedGenerator
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(UriInterface $pdsUri, string $feed = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.feed.getFeedGenerator')
                    ->withQuery(http_build_query(array_filter([
                        'feed' => $feed,
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
