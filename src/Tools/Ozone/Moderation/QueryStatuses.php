<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Moderation;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * View moderation statuses of subjects (record or repo).
 *
 * @see QueryStatusesTest
 */
final readonly class QueryStatuses
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?bool $includeAllUserRecords = null,
        ?string $subject = null,
        ?string $comment = null,
        ?string $reportedAfter = null,
        ?string $reportedBefore = null,
        ?string $reviewedAfter = null,
        ?string $hostingDeletedAfter = null,
        ?string $hostingDeletedBefore = null,
        ?string $hostingUpdatedAfter = null,
        ?string $hostingUpdatedBefore = null,
        ?array $hostingStatuses = null,
        ?string $reviewedBefore = null,
        ?bool $includeMuted = null,
        ?bool $onlyMuted = null,
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
        ?array $collections = null,
        ?string $subjectType = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/tools.ozone.moderation.queryStatuses')
                    ->withQuery(\http_build_query(\array_filter([
                        'includeAllUserRecords' => $includeAllUserRecords,
                        'subject' => $subject,
                        'comment' => $comment,
                        'reportedAfter' => $reportedAfter,
                        'reportedBefore' => $reportedBefore,
                        'reviewedAfter' => $reviewedAfter,
                        'hostingDeletedAfter' => $hostingDeletedAfter,
                        'hostingDeletedBefore' => $hostingDeletedBefore,
                        'hostingUpdatedAfter' => $hostingUpdatedAfter,
                        'hostingUpdatedBefore' => $hostingUpdatedBefore,
                        'hostingStatuses' => $hostingStatuses,
                        'reviewedBefore' => $reviewedBefore,
                        'includeMuted' => $includeMuted,
                        'onlyMuted' => $onlyMuted,
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
                        'collections' => $collections,
                        'subjectType' => $subjectType,
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
