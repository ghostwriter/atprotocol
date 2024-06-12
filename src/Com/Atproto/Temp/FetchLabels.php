<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Temp;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * DEPRECATED: use queryLabels or subscribeLabels instead -- Fetch all labels from a labeler created after a certain date.
 *
 * @see \Tests\Unit\Com\Atproto\Temp\FetchLabelsTest
 */
final readonly class FetchLabels
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(UriInterface $pdsUri, ?int $since = null, ?int $limit = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.temp.fetchLabels')
                    ->withQuery(http_build_query(array_filter([
                        'since' => $since,
                        'limit' => $limit,
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
