<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Setting;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

/**
 * Create or update setting option.
 *
 * @see UpsertOptionTest
 */
final readonly class UpsertOption
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $key = null,
        ?string $scope = null,
        ?string $value = null,
        ?string $description = null,
        ?string $managerRole = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/tools.ozone.setting.upsertOption'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'key' => $key,
            'scope' => $scope,
            'value' => $value,
            'description' => $description,
            'managerRole' => $managerRole,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
