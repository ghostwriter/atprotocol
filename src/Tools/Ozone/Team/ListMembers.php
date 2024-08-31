<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Team;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * List all members with access to the ozone service.
 *
 * @see ListMembersTest
 */
final readonly class ListMembers
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(UriInterface $uri, ?int $limit = null, ?string $cursor = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/tools.ozone.team.listMembers')
                    ->withQuery(http_build_query(array_filter([
                        'limit' => $limit,
                        'cursor' => $cursor,
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
