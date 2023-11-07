<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * Take a moderation action on a repo.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Admin\TakeModerationActionTest
 */
final readonly class TakeModerationAction
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        string $action = null,
        string $subject = null,
        string $reason = null,
        string $createdBy = null,
        ?array $subjectBlobCids = null,
        ?array $createLabelVals = null,
        ?array $negateLabelVals = null,
        ?int $durationInHours = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $uri->withPath('xrpc/com.atproto.admin.takeModerationAction')
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'action' => $action,
            'subject' => $subject,
            'subjectBlobCids' => $subjectBlobCids,
            'createLabelVals' => $createLabelVals,
            'negateLabelVals' => $negateLabelVals,
            'reason' => $reason,
            'durationInHours' => $durationInHours,
            'createdBy' => $createdBy,
        ]));

        if (false === $jsonBody){
            throw new \RuntimeException('Failed to encode JSON');
        }

        return $request->withBody(
            $this->streamFactory->createStream(
                $jsonBody
            )
        );
    }
}
