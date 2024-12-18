<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Video;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get status details for a video processing job.
 *
 * @see GetJobStatusTest
 */
final readonly class GetJobStatus
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $jobId = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.video.getJobStatus')
                    ->withQuery(\http_build_query(\array_filter([
                    'jobId' => $jobId,
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
