<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * View moderation statuses of subjects (record or repo).
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\Com\Atproto\Admin\QueryModerationStatusesTest
 */
final readonly class QueryModerationStatuses
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $subject = null,
        ?string $comment = null,
        ?string $reportedAfter = null,
        ?string $reportedBefore = null,
        ?string $reviewedAfter = null,
        ?string $reviewedBefore = null,
        ?bool $includeMuted = null,
        ?string $reviewState = null,
        ?array $ignoreSubjects = null,
        ?string $lastReviewedBy = null,
        ?string $sortField = null,
        ?string $sortDirection = null,
        ?bool $takendown = null,
        ?bool $appealed = null,
        ?int $limit = null,
        ?array $tags = null,
        ?array $excludeTags = null,
        ?string $cursor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.admin.queryModerationStatuses')
                    ->withQuery(http_build_query(array_filter([
                    'subject' => $subject,
                    'comment' => $comment,
                    'reportedAfter' => $reportedAfter,
                    'reportedBefore' => $reportedBefore,
                    'reviewedAfter' => $reviewedAfter,
                    'reviewedBefore' => $reviewedBefore,
                    'includeMuted' => $includeMuted,
                    'reviewState' => $reviewState,
                    'ignoreSubjects' => $ignoreSubjects,
                    'lastReviewedBy' => $lastReviewedBy,
                    'sortField' => $sortField,
                    'sortDirection' => $sortDirection,
                    'takendown' => $takendown,
                    'appealed' => $appealed,
                    'limit' => $limit,
                    'tags' => $tags,
                    'excludeTags' => $excludeTags,
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
