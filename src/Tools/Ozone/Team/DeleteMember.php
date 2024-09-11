<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Team;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

/**
 * Delete a member from ozone team. Requires admin role.
 *
 * @see DeleteMemberTest
 */
final readonly class DeleteMember
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(UriInterface $uri, ?string $did = null): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest('POST', $uri->withPath('xrpc/tools.ozone.team.deleteMember'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'did' => $did,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
