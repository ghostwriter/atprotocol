<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Server;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get details about ozone's server configuration.
 *
 * @see \Tests\Unit\Tools\Ozone\Server\GetConfigTest
 */
final readonly class GetConfig
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(UriInterface $pdsUri): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/tools.ozone.server.getConfig')
                    ->withQuery(http_build_query(array_filter([])))
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
