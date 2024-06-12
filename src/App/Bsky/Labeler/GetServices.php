<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Labeler;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get information about a list of labeler services.
 *
 * @see \Tests\Unit\App\Bsky\Labeler\GetServicesTest
 */
final readonly class GetServices
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(UriInterface $pdsUri, array $dids = null, ?bool $detailed = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.labeler.getServices')
                    ->withQuery(http_build_query(array_filter([
                        'dids' => $dids,
                        'detailed' => $detailed,
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
