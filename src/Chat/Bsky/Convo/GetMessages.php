<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Chat\Bsky\Convo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 *
 * @see GetMessagesTest
 */
final readonly class GetMessages
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $convoId = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/chat.bsky.convo.getMessages')
                    ->withQuery(\http_build_query(\array_filter([
                        'convoId' => $convoId,
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
