<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Repo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * List a range of records in a collection.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Repo\ListRecordsTest
 */
final readonly class ListRecords
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        string $repo = null,
        string $collection = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?bool $reverse = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.repo.listRecords')
                    ->withQuery(http_build_query(array_filter([
                    'repo' => $repo,
                    'collection' => $collection,
                    'limit' => $limit,
                    'cursor' => $cursor,
                    'reverse' => $reverse,
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
