<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Repo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

use const JSON_THROW_ON_ERROR;

use function array_filter;
use function json_encode;

/**
 * Import a repo in the form of a CAR file. Requires Content-Length HTTP header to be set.
 *
 * @see ImportRepoTest
 */
final readonly class ImportRepo
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(UriInterface $pdsUri): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/com.atproto.repo.importRepo'));

        $headers = [
            'Accept' => 'application/vnd.ipld.car',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([]), JSON_THROW_ON_ERROR);

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
