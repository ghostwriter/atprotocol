<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Moderation;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function array_filter;
use function http_build_query;

/**
 * List moderation events related to a subject.
 *
 * @see QueryEventsTest
 */
final readonly class QueryEvents
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?array $types = null,
        ?string $createdBy = null,
        ?string $sortDirection = null,
        ?string $createdAfter = null,
        ?string $createdBefore = null,
        ?string $subject = null,
        ?array $collections = null,
        ?string $subjectType = null,
        ?bool $includeAllUserRecords = null,
        ?int $limit = null,
        ?bool $hasComment = null,
        ?string $comment = null,
        ?array $addedLabels = null,
        ?array $removedLabels = null,
        ?array $addedTags = null,
        ?array $removedTags = null,
        ?array $reportTypes = null,
        ?string $cursor = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/tools.ozone.moderation.queryEvents')
                    ->withQuery(http_build_query(array_filter([
                        'types' => $types,
                        'createdBy' => $createdBy,
                        'sortDirection' => $sortDirection,
                        'createdAfter' => $createdAfter,
                        'createdBefore' => $createdBefore,
                        'subject' => $subject,
                        'collections' => $collections,
                        'subjectType' => $subjectType,
                        'includeAllUserRecords' => $includeAllUserRecords,
                        'limit' => $limit,
                        'hasComment' => $hasComment,
                        'comment' => $comment,
                        'addedLabels' => $addedLabels,
                        'removedLabels' => $removedLabels,
                        'addedTags' => $addedTags,
                        'removedTags' => $removedTags,
                        'reportTypes' => $reportTypes,
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
