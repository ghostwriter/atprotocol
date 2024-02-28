<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Sync;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get data blocks needed to prove the existence or non-existence of record in the current version of repo. Does not require auth.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Sync\GetRecordTest
 */
final readonly class GetRecord
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        string $did = null,
        string $collection = null,
        string $rkey = null,
        ?string $commit = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.sync.getRecord')
                    ->withQuery(http_build_query(array_filter([
                    'did' => $did,
                    'collection' => $collection,
                    'rkey' => $rkey,
                    'commit' => $commit,
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
