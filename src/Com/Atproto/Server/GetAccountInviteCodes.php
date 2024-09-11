<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Server;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get all invite codes for the current account. Requires auth.
 *
 * @see GetAccountInviteCodesTest
 */
final readonly class GetAccountInviteCodes
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $uri,
        ?bool $includeUsed = null,
        ?bool $createAvailable = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/com.atproto.server.getAccountInviteCodes')
                    ->withQuery(\http_build_query(\array_filter([
                        'includeUsed' => $includeUsed,
                        'createAvailable' => $createAvailable,
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
