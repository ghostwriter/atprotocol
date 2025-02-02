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
 * Register to receive push notifications, via a specified service, for the requesting account. Requires auth.
 *
 * @see RegisterPushTest
 */
final readonly class RegisterPush
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $serviceDid = null,
        ?string $token = null,
        ?string $platform = null,
        ?string $appId = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/app.bsky.notification.registerPush'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'serviceDid' => $serviceDid,
            'token' => $token,
            'platform' => $platform,
            'appId' => $appId,
        ]), JSON_THROW_ON_ERROR);

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
