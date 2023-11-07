<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * List moderation actions related to a subject.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Admin\GetModerationActionsTest
 */
final readonly class GetModerationActions
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        ?string $subject = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $uri->withPath('xrpc/com.atproto.admin.getModerationActions')
                    ->withQuery(http_build_query(array_filter([
                    'subject' => $subject,
                    'limit' => $limit,
                    'cursor' => $cursor,
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
