<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Signature;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Search for accounts that match one or more threat signature values.
 *
 * @see SearchAccountsTest
 */
final readonly class SearchAccounts
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?array $values = null,
        ?string $cursor = null,
        ?int $limit = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/tools.ozone.signature.searchAccounts')
                    ->withQuery(\http_build_query(\array_filter([
                        'values' => $values,
                        'cursor' => $cursor,
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