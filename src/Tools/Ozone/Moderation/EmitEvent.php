<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Moderation;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

use function array_filter;
use function json_encode;

/**
 * Take a moderation action on an actor.
 *
 * @see EmitEventTest
 */
final readonly class EmitEvent
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $uri,
        ?string $event = null,
        ?string $subject = null,
        ?string $createdBy = null,
        ?array $subjectBlobCids = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $uri->withPath('xrpc/tools.ozone.moderation.emitEvent'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'event' => $event,
            'subject' => $subject,
            'subjectBlobCids' => $subjectBlobCids,
            'createdBy' => $createdBy,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
