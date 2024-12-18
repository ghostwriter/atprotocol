<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Chat\Bsky\Moderation;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * GetActorMetadata
 *
 * @see GetActorMetadataTest
 */
final readonly class GetActorMetadata
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $actor = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/chat.bsky.moderation.getActorMetadata')
                    ->withQuery(\http_build_query(\array_filter([
                    'actor' => $actor,
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
