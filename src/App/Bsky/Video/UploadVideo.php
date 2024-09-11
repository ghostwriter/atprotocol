<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Video;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

/**
 * Upload a video to be processed then stored on the PDS.
 *
 * @see UploadVideoTest
 */
final readonly class UploadVideo
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(UriInterface $uri): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest('POST', $uri->withPath('xrpc/app.bsky.video.uploadVideo'));

        $headers = [
            'Accept' => 'video/mp4',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
