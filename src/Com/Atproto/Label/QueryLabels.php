<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Label;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Find labels relevant to the provided URI patterns.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Label\QueryLabelsTest
 */
final readonly class QueryLabels
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        array $uriPatterns = null,
        ?array $sources = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.label.queryLabels')
                    ->withQuery(http_build_query(array_filter([
                    'uriPatterns' => $uriPatterns,
                    'sources' => $sources,
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
