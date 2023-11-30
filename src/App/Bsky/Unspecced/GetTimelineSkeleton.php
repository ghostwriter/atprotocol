<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Unspecced;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * DEPRECATED: a skeleton of a timeline. Unspecced and will be unavailable soon.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\App\Bsky\Unspecced\GetTimelineSkeletonTest
 */
final readonly class GetTimelineSkeleton
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.unspecced.getTimelineSkeleton')
                    ->withQuery(http_build_query(array_filter([
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
