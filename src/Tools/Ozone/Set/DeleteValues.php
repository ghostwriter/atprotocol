<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Set;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

use const JSON_THROW_ON_ERROR;

/**
 * Delete values from a specific set. Attempting to delete values that are not in the set will not result in an error
 *
 * @see DeleteValuesTest
 */
final readonly class DeleteValues
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $name = null,
        ?array $values = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $pdsUri->withPath('xrpc/tools.ozone.set.deleteValues')
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'name' => $name,
            'values' => $values,
        ]), JSON_THROW_ON_ERROR);

        return $request->withBody(
            $this->streamFactory->createStream(
                $jsonBody
            )
        );
    }
}
