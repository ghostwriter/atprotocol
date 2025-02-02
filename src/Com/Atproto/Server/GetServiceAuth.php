<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Server;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get a signed token on behalf of the requesting DID for the requested service.
 *
 * @see GetServiceAuthTest
 */
final readonly class GetServiceAuth
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $aud = null,
        ?int $exp = null,
        ?string $lxm = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.server.getServiceAuth')
                    ->withQuery(http_build_query(array_filter([
                        'aud' => $aud,
                        'exp' => $exp,
                        'lxm' => $lxm,
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
