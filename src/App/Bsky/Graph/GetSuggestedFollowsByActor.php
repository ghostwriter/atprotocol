<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Graph;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Enumerates follows similar to a given account (actor). Expected use is to recommend additional accounts immediately after following one account.
 *
 * @see GetSuggestedFollowsByActorTest
 */
final readonly class GetSuggestedFollowsByActor
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
                $pdsUri->withPath('xrpc/app.bsky.graph.getSuggestedFollowsByActor')
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
