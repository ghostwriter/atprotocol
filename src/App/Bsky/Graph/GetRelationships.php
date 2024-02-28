<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Graph;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Enumerates public relationships between one account, and a list of other accounts. Does not require auth.
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\App\Bsky\Graph\GetRelationshipsTest
 */
final readonly class GetRelationships
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        string $actor = null,
        ?array $others = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.graph.getRelationships')
                    ->withQuery(http_build_query(array_filter([
                    'actor' => $actor,
                    'others' => $others,
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
