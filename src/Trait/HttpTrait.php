<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Trait;

use Composer\InstalledVersions;
use Ghostwriter\AtProtocol\Exception\ShouldNotHappenException;
use Ghostwriter\Json\Interface\JsonInterface;
use Ghostwriter\Json\Json;
use Http\Client\Curl\Client;
use Laminas\Diactoros\RequestFactory;
use Laminas\Diactoros\StreamFactory;
use Laminas\Diactoros\Uri;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Throwable;

use const PHP_OS_FAMILY;
use const PHP_VERSION;

use function array_key_exists;
use function array_merge;
use function curl_version;
use function http_build_query;
use function is_array;
use function is_string;
use function php_uname;
use function sprintf;

trait HttpTrait
{
    private const string GHOSTWRITER_ATPROTOCOL = 'ghostwriter/atprotocol';

    public function __construct(
        private readonly UriInterface $uri,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
        private readonly ClientInterface $httpClient,
        private readonly JsonInterface $json,
    ) {}

    public static function new(string $uri): self
    {
        return new self(new Uri($uri), new RequestFactory(), new StreamFactory(), new Client(), new Json());
    }

    /**
     * @param array<string,string|string[]> $headers
     *
     * @throws Throwable
     */
    public function delete(UriInterface $uri, StreamInterface $stream, array $headers = []): ResponseInterface
    {
        $request = $this->request('DELETE', $uri, $stream, $headers);

        return $this->sendRequest($request);
    }

    /**
     * @param array<string,string|string[]> $headers
     *
     * @throws Throwable
     */
    public function get(UriInterface $uri, StreamInterface $stream, array $headers = []): ResponseInterface
    {
        $request = $this->request('GET', $uri, $stream, $headers);

        return $this->sendRequest($request);
    }

    /**
     * @param array<string,string|string[]> $headers
     *
     * @throws Throwable
     */
    public function patch(UriInterface $uri, StreamInterface $stream, array $headers = []): ResponseInterface
    {
        $request = $this->request('PATCH', $uri, $stream, $headers);

        return $this->sendRequest($request);
    }

    /**
     * @param array<string,string> $query
     */
    public function path(string $path, array $query = []): UriInterface
    {
        $uri = $this->uri->withPath($path);

        if ([] === $query) {
            return $uri;
        }

        return $uri->withQuery(http_build_query($query));
    }

    /**
     * @param array<string,string|string[]> $headers
     *
     * @throws Throwable
     */
    public function post(UriInterface $uri, StreamInterface $stream, array $headers = []): ResponseInterface
    {
        $request = $this->request('POST', $uri, $stream, $headers);

        return $this->sendRequest($request);
    }

    /**
     * @param array<string,string|string[]> $headers
     *
     * @throws Throwable
     */
    public function put(UriInterface $uri, StreamInterface $stream, array $headers = []): ResponseInterface
    {
        $request = $this->request('PUT', $uri, $stream, $headers);

        return $this->sendRequest($request);
    }

    /**
     * @param array<string,string|string[]> $headers
     *
     * @throws Throwable
     */
    public function request(
        string $method,
        UriInterface $uri,
        StreamInterface $stream,
        array $headers = [],
    ): RequestInterface {
        // default headers can be overridden
        // by what is passed in.

        $headers = array_merge(self::defaultHeaders(), $headers);

        $request = $this->requestFactory->createRequest($method, $uri);

        foreach ($headers as $name => $value) {
            if (! is_string($name)) {
                // TODO: skip or throw?
                continue;
            }

            if (! is_string($value) && ! is_array($value)) {
                // TODO: skip or throw?
                continue;
            }

            $request = $request->withHeader($name, $value);
        }

        return $request->withBody($stream);
    }

    /** @throws Throwable */
    public static function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
            'User-Agent' => sprintf(
                'AtProtocol/%s (GitHub: %s; cURL/%s; PHP/%s; OS/%s; Arch/%s)',
                InstalledVersions::getPrettyVersion(self::GHOSTWRITER_ATPROTOCOL),
                self::GHOSTWRITER_ATPROTOCOL,
                self::curlVersion(),
                PHP_VERSION,
                PHP_OS_FAMILY,
                php_uname('m')
            ),
        ];
    }

    private static function curlVersion(): string
    {
        $curl = curl_version();

        if (array_key_exists('version', $curl)) {
            return $curl['version'];
        }

        throw new ShouldNotHappenException('curl version not found');
    }
}
