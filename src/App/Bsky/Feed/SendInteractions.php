<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Feed;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

use const JSON_THROW_ON_ERROR;

use function array_filter;
use function json_encode;

/**
 * Send information about interactions with feed items back to the feed generator that served them.
 *
 * @see SendInteractionsTest
 */
final readonly class SendInteractions
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(UriInterface $pdsUri, ?array $interactions = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/app.bsky.feed.sendInteractions'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'interactions' => $interactions,
        ]), JSON_THROW_ON_ERROR);

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
