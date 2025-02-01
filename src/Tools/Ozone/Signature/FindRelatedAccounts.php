<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Signature;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get accounts that share some matching threat signatures with the root account.
 *
 * @see FindRelatedAccountsTest
 */
final readonly class FindRelatedAccounts
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $did = null,
        ?string $cursor = null,
        ?int $limit = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/tools.ozone.signature.findRelatedAccounts')
                    ->withQuery(http_build_query(array_filter([
                        'did' => $did,
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
