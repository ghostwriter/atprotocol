<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Find repositories based on a search term.
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\Com\Atproto\Admin\SearchReposTest
 */
final readonly class SearchRepos
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $q = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.admin.searchRepos')
                    ->withQuery(http_build_query(array_filter([
                    'q' => $q,
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
