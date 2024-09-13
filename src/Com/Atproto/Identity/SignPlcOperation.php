<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Identity;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

/**
 * Signs a PLC operation to update some value(s) in the requesting DID's document.
 *
 * @see SignPlcOperationTest
 */
final readonly class SignPlcOperation
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $token = null,
        ?array $rotationKeys = null,
        ?array $alsoKnownAs = null,
        ?string $verificationMethods = null,
        ?string $services = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/com.atproto.identity.signPlcOperation'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'token' => $token,
            'rotationKeys' => $rotationKeys,
            'alsoKnownAs' => $alsoKnownAs,
            'verificationMethods' => $verificationMethods,
            'services' => $services,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
