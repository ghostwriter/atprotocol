<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Repo;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * Create a new record.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Repo\CreateRecordTest
 */
final readonly class CreateRecord
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        string $repo = null,
        string $collection = null,
        string $record = null,
        ?string $rkey = null,
        ?bool $validate = null,
        ?string $swapCommit = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $pdsUri->withPath('xrpc/com.atproto.repo.createRecord')
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'repo' => $repo,
            'collection' => $collection,
            'rkey' => $rkey,
            'validate' => $validate,
            'record' => $record,
            'swapCommit' => $swapCommit,
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
