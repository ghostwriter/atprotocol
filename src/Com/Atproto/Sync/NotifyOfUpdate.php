<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Sync;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

use function array_filter;
use function json_encode;

/**
 * Notify a crawling service of a recent update, and that crawling should resume. Intended use is after a gap between repo stream events caused the crawling service to disconnect. Does not require auth; implemented by Relay.
 *
 * @see \Tests\Unit\Com\Atproto\Sync\NotifyOfUpdateTest
 */
final readonly class NotifyOfUpdate
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(UriInterface $pdsUri, string $hostname = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/com.atproto.sync.notifyOfUpdate'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'hostname' => $hostname,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
