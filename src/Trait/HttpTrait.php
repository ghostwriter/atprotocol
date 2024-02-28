<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Trait;

use Composer\InstalledVersions;
use Http\Client\Curl\Client;
use Laminas\Diactoros\RequestFactory;
use Laminas\Diactoros\StreamFactory;
use Laminas\Diactoros\Uri;
use Laminas\Diactoros\UriFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Ghostwriter\AtProtocol\Com\Atproto\Server\CreateSession;

trait HttpTrait
{
    public static function new(string $uri): self
    {
        return new self(
            new Uri($uri),
            new RequestFactory,
            new StreamFactory,
            new Client,
        );
    }

    public function __construct(
        private readonly UriInterface $uri,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
        private readonly ClientInterface $httpClient,
    ) {
    }

    public static function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
            'User-Agent' => sprintf(
                'Ghostwriter/Atprotocol (%s; PHP %s; OS %s)',
                InstalledVersions::getPrettyVersion('ghostwriter/atprotocol'),
                PHP_VERSION,
                PHP_OS_FAMILY,
            )
        ];
    }

    /**
     * @param array<string,string> $query
     */
    public function path(
        string $path,
        array $query = [],
    ): UriInterface {
        $uri = $this->uri->withPath($path);

        if ($query === []) {
            return $uri;
        }

        return $uri->withQuery(http_build_query($query));
    }

    /**
     * @param array<string,string|string[]> $headers
     */
    public function request(
        string $method,
        UriInterface $uri,
        StreamInterface $body,
        array $headers = [],
    ): RequestInterface {
        // default headers can be overridden
        // by what is passed in.

        $headers = array_merge(
            self::defaultHeaders(),
            $headers
        );

        $request = $this->requestFactory
            ->createRequest($method, $uri);

        foreach ($headers as $name => $value) {
            if (!is_string($name)) {
                // TODO: skip or throw?
                continue;
            }

            if (!is_string($value) && !is_array($value)) {
                // TODO: skip or throw?
                continue;
            }

            $request = $request->withHeader($name, $value);
        }

        return $request->withBody($body);
    }
    /**
     * @param array<string,string|string[]> $headers
     */
    public function delete(
        UriInterface $uri,
        StreamInterface $body,
        array $headers = [],
    ): ResponseInterface {
        return $this->httpClient->sendRequest(
            $this->request('DELETE', $uri, $body, $headers)
        );
    }
    /**
     * @param array<string,string|string[]> $headers
     */
    public function patch(
        UriInterface $uri,
        StreamInterface $body,
        array $headers = [],
    ): ResponseInterface {
        return $this->httpClient->sendRequest(
            $this->request('PATCH', $uri, $body, $headers)
        );
    }
    /**
     * @param array<string,string|string[]> $headers
     */
    public function put(
        UriInterface $uri,
        StreamInterface $body,
        array $headers = [],
    ): ResponseInterface {
        return $this->httpClient->sendRequest(
            $this->request('PUT', $uri, $body, $headers)
        );
    }
    /**
     * @param array<string,string|string[]> $headers
     */
    public function post(
        UriInterface $uri,
        StreamInterface $body,
        array $headers = [],
    ): ResponseInterface {
        return $this->httpClient->sendRequest(
            $this->request('POST', $uri, $body, $headers)
        );
    }
    /**
     * @param array<string,string|string[]> $headers
     */
    public function get(
        UriInterface $uri,
        StreamInterface $body,
        array $headers = [],
    ): ResponseInterface {
        return $this->httpClient->sendRequest(
            $this->request('GET', $uri, $body, $headers)
        );
    }
}
