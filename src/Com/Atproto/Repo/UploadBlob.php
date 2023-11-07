<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Repo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * Upload a new blob to be added to repo in a later request.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Repo\UploadBlobTest
 */
final readonly class UploadBlob
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $uri->withPath('xrpc/com.atproto.repo.uploadBlob')
            );

        $headers = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            
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
