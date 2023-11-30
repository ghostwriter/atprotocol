<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Sync;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get a blob associated with a given repo.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Sync\GetBlobTest
 */
final readonly class GetBlob
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        string $did = null,
        string $cid = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.sync.getBlob')
                    ->withQuery(http_build_query(array_filter([
                    'did' => $did,
                    'cid' => $cid,
                ])))
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => '*/*; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $request;
    }
}
