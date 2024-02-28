<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Identity;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Describe the credentials that should be included in the DID doc of an account that is migrating to this service.
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\Com\Atproto\Identity\GetRecommendedDidCredentialsTest
 */
final readonly class GetRecommendedDidCredentials
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.identity.getRecommendedDidCredentials')
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
