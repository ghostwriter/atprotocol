<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Chat\Bsky\Convo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

/**
 *
 * @see SendMessageBatchTest
 */
final readonly class SendMessageBatch
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(UriInterface $uri, ?array $items = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest('POST', $uri->withPath('xrpc/chat.bsky.convo.sendMessageBatch'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'items' => $items,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
