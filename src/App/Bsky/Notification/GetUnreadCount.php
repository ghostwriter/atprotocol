<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Notification;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get the count of unread notifications.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\App\Bsky\Notification\GetUnreadCountTest
 */
final readonly class GetUnreadCount
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $seenAt = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.notification.getUnreadCount')
                    ->withQuery(http_build_query(array_filter([
                    'seenAt' => $seenAt,
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
