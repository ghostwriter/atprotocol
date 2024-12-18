<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Notification;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Count the number of unread notifications for the requesting account. Requires auth.
 *
 * @see GetUnreadCountTest
 */
final readonly class GetUnreadCount
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?bool $priority = null,
        ?string $seenAt = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.notification.getUnreadCount')
                    ->withQuery(http_build_query(array_filter([
                        'priority' => $priority,
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
