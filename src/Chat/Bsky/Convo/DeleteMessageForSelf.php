<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Chat\Bsky\Convo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

use function array_filter;
use function json_encode;

/**
 * DeleteMessageForSelf.
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\Chat\Bsky\Convo\DeleteMessageForSelfTest
 */
final readonly class DeleteMessageForSelf
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        string $convoId = null,
        string $messageId = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/chat.bsky.convo.deleteMessageForSelf'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'convoId' => $convoId,
            'messageId' => $messageId,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
