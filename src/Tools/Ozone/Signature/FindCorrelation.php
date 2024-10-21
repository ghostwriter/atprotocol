<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Signature;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Find all correlated threat signatures between 2 or more accounts.
 *
 * @see FindCorrelationTest
 */
final readonly class FindCorrelation
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(UriInterface $pdsUri, ?array $dids = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/tools.ozone.signature.findCorrelation')
                    ->withQuery(\http_build_query(\array_filter([
                        'dids' => $dids,
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
