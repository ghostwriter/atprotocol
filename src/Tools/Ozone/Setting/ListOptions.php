<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Setting;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * List settings with optional filtering.
 *
 * @see ListOptionsTest
 */
final readonly class ListOptions
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $scope = null,
        ?string $prefix = null,
        ?array $keys = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/tools.ozone.setting.listOptions')
                    ->withQuery(\http_build_query(\array_filter([
                        'limit' => $limit,
                        'cursor' => $cursor,
                        'scope' => $scope,
                        'prefix' => $prefix,
                        'keys' => $keys,
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
