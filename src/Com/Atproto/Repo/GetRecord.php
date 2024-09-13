<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Repo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get a single record from a repository. Does not require auth.
 *
 * @see GetRecordTest
 */
final readonly class GetRecord
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $repo = null,
        ?string $collection = null,
        ?string $rkey = null,
        ?string $cid = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.repo.getRecord')
                    ->withQuery(\http_build_query(\array_filter([
                        'repo' => $repo,
                        'collection' => $collection,
                        'rkey' => $rkey,
                        'cid' => $cid,
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
