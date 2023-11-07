<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * Update the service-specific admin status of a subject (account, record, or blob)
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Admin\UpdateSubjectStatusTest
 */
final readonly class UpdateSubjectStatus
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        string $subject = null,
        ?string $takedown = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $uri->withPath('xrpc/com.atproto.admin.updateSubjectStatus')
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'subject' => $subject,
            'takedown' => $takedown,
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
