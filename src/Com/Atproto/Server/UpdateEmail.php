<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Server;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

use function array_filter;
use function json_encode;

/**
 * Update an account's email.
 *
 * @see \Tests\Unit\Com\Atproto\Server\UpdateEmailTest
 */
final readonly class UpdateEmail
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $email = null,
        ?bool $emailAuthFactor = null,
        ?string $token = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/com.atproto.server.updateEmail'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'email' => $email,
            'emailAuthFactor' => $emailAuthFactor,
            'token' => $token,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
