<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Sync;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Gets the did's repo, optionally catching up from a specific revision.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Sync\GetRepoTest
 */
final readonly class GetRepo
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        string $did = null,
        ?string $since = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/com.atproto.sync.getRepo')
                    ->withQuery(http_build_query(array_filter([
                    'did' => $did,
                    'since' => $since,
                ])))
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/vnd.ipld.car; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $request;
    }
}
