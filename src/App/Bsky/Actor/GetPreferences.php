<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\App\Bsky\Actor;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get private preferences attached to the account.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\App\Bsky\Actor\GetPreferencesTest
 */
final readonly class GetPreferences
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/app.bsky.actor.getPreferences')
                    ->withQuery(http_build_query(array_filter([])))
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
