<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Server;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * Create an account.
 *
 * @see \Ghostwriter\AtProtocol\Tests\Unit\Com\Atproto\Server\CreateAccountTest
 */
final readonly class CreateAccount
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {}

    public function __invoke(
        UriInterface $uri,
        string $handle = null,
        ?string $email = null,
        ?string $did = null,
        ?string $inviteCode = null,
        ?string $password = null,
        ?string $recoveryKey = null,
        ?string $plcOp = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $uri->withPath('xrpc/com.atproto.server.createAccount')
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'email' => $email,
            'handle' => $handle,
            'did' => $did,
            'inviteCode' => $inviteCode,
            'password' => $password,
            'recoveryKey' => $recoveryKey,
            'plcOp' => $plcOp,
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