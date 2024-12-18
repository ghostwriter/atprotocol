<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Repo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get information about an account and repository, including the list of collections. Does not require auth.
 *
 * @see DescribeRepoTest
 */
final readonly class DescribeRepo
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $repo = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.repo.describeRepo')
                    ->withQuery(\http_build_query(\array_filter([
                    'repo' => $repo,
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
