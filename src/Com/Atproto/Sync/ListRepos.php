<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Sync;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Enumerates all the DID, rev, and commit CID for all repos hosted by this service. Does not require auth; implemented by PDS and Relay.
 *
 * @see ListReposTest
 */
final readonly class ListRepos
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(UriInterface $pdsUri, ?int $limit = null, ?string $cursor = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.sync.listRepos')
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
