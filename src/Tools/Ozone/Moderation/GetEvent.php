<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Moderation;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get details about a moderation event.
 *
 * @see GetEventTest
 */
final readonly class GetEvent
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(UriInterface $uri, ?int $id = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/tools.ozone.moderation.getEvent')
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
