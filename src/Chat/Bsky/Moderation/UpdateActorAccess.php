<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Chat\Bsky\Moderation;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

use const JSON_THROW_ON_ERROR;

/**
 * UpdateActorAccess
 *
 * @see UpdateActorAccessTest
 */
final readonly class UpdateActorAccess
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $actor = null,
        ?bool $allowAccess = null,
        ?string $ref = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $pdsUri->withPath('xrpc/chat.bsky.moderation.updateActorAccess')
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'actor' => $actor,
            'allowAccess' => $allowAccess,
            'ref' => $ref,
        ]), JSON_THROW_ON_ERROR);

        return $request->withBody(
            $this->streamFactory->createStream(
                $jsonBody
            )
        );
    }
}
