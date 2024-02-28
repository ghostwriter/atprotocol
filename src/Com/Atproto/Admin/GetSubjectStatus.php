<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Get the service-specific admin status of a subject (account, record, or blob).
 *
 * @see \Ghostwriter\AtProtocolTests\Unit\Com\Atproto\Admin\GetSubjectStatusTest
 */
final readonly class GetSubjectStatus
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
    ) {}

    public function __invoke(
        UriInterface $pdsUri,
        ?string $did = null,
        ?string $uri = null,
        ?string $blob = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $pdsUri->withPath('xrpc/com.atproto.admin.getSubjectStatus')
                    ->withQuery(http_build_query(array_filter([
                    'did' => $did,
                    'uri' => $uri,
                    'blob' => $blob,
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
