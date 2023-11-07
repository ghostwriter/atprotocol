<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Sync;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Gets the current commit CID & revision of the repo.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Sync\GetLatestCommitTest
 */
final readonly class GetLatestCommit
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        string $did = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/com.atproto.sync.getLatestCommit')
                    ->withQuery(http_build_query(array_filter([
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
