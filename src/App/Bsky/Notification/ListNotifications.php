<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Notification;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Enumerate notifications for the requesting account. Requires auth.
 *
 * @see ListNotificationsTest
 */
final readonly class ListNotifications
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?array $reasons = null,
        ?int $limit = null,
        ?bool $priority = null,
        ?string $cursor = null,
        ?string $seenAt = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.notification.listNotifications')
                    ->withQuery(http_build_query(array_filter([
                        'reasons' => $reasons,
                        'limit' => $limit,
                        'priority' => $priority,
                        'cursor' => $cursor,
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
