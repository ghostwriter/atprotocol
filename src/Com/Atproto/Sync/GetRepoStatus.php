<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Sync;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get the hosting status for a repository, on this server. Expected to be implemented by PDS and Relay.
 *
 * @see GetRepoStatusTest
 */
final readonly class GetRepoStatus
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(UriInterface $pdsUri, ?string $did = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.sync.getRepoStatus')
                    ->withQuery(\http_build_query(\array_filter([
                        'did' => $did,
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
