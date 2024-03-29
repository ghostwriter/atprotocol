<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get details about a moderation event.
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\Com\Atproto\Admin\GetModerationEventTest
 */
final readonly class GetModerationEvent
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        int $id = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.admin.getModerationEvent')
                    ->withQuery(http_build_query(array_filter([
                    'id' => $id,
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
