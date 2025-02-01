<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Notification;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

use const JSON_THROW_ON_ERROR;

use function array_filter;
use function json_encode;

/**
 * Set notification-related preferences for an account. Requires auth.
 *
 * @see PutPreferencesTest
 */
final readonly class PutPreferences
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(UriInterface $pdsUri, ?bool $priority = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/app.bsky.notification.putPreferences'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'priority' => $priority,
        ]), JSON_THROW_ON_ERROR);

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
