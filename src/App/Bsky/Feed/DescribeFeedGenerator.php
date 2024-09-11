<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Feed;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get information about a feed generator, including policies and offered feed URIs. Does not require auth; implemented by Feed Generator services (not App View).
 *
 * @see DescribeFeedGeneratorTest
 */
final readonly class DescribeFeedGenerator
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(UriInterface $uri): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/app.bsky.feed.describeFeedGenerator')
                    ->withQuery(\http_build_query(\array_filter([])))
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
