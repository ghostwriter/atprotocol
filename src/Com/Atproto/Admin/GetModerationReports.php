<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * Get moderation reports related to a subject.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Admin\GetModerationReportsTest
 */
final readonly class GetModerationReports
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $subject = null,
        ?array $ignoreSubjects = null,
        ?string $actionedBy = null,
        ?array $reporters = null,
        ?bool $resolved = null,
        ?string $actionType = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?bool $reverse = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.admin.getModerationReports')
                    ->withQuery(http_build_query(array_filter([
                        'subject' => $subject,
                        'ignoreSubjects' => $ignoreSubjects,
                        'actionedBy' => $actionedBy,
                        'reporters' => $reporters,
                        'resolved' => $resolved,
                        'actionType' => $actionType,
                        'limit' => $limit,
                        'cursor' => $cursor,
                        'reverse' => $reverse,
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
