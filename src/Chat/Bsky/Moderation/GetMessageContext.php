<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Chat\Bsky\Moderation;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 *
 * @see GetMessageContextTest
 */
final readonly class GetMessageContext
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $messageId = null,
        ?string $convoId = null,
        ?int $before = null,
        ?int $after = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/chat.bsky.moderation.getMessageContext')
                    ->withQuery(http_build_query(array_filter([
                        'convoId' => $convoId,
                        'messageId' => $messageId,
                        'before' => $before,
                        'after' => $after,
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
