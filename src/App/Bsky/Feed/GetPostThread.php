<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Feed;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * GetPostThread
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\App\Bsky\Feed\GetPostThreadTest
 */
final readonly class GetPostThread
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        string $uri = null,
        ?int $depth = null,
        ?int $parentHeight = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/app.bsky.feed.getPostThread')
                    ->withQuery(http_build_query(array_filter([
                    'uri' => $uri,
                    'depth' => $depth,
                    'parentHeight' => $parentHeight,
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
