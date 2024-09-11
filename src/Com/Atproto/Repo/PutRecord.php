<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Repo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

/**
 * Write a repository record, creating or updating it as needed. Requires auth, implemented by PDS.
 *
 * @see PutRecordTest
 */
final readonly class PutRecord
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $uri,
        ?string $repo = null,
        ?string $collection = null,
        ?string $rkey = null,
        ?string $record = null,
        ?bool $validate = null,
        ?string $swapRecord = null,
        ?string $swapCommit = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $uri->withPath('xrpc/com.atproto.repo.putRecord'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'repo' => $repo,
            'collection' => $collection,
            'rkey' => $rkey,
            'validate' => $validate,
            'record' => $record,
            'swapRecord' => $swapRecord,
            'swapCommit' => $swapCommit,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
