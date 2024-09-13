<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Communication;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

/**
 * Administrative action to create a new, re-usable communication (email for now) template.
 *
 * @see CreateTemplateTest
 */
final readonly class CreateTemplate
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $pdsUri,
        ?string $name = null,
        ?string $contentMarkdown = null,
        ?string $subject = null,
        ?string $lang = null,
        ?string $createdBy = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $pdsUri->withPath('xrpc/tools.ozone.communication.createTemplate'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'name' => $name,
            'contentMarkdown' => $contentMarkdown,
            'subject' => $subject,
            'lang' => $lang,
            'createdBy' => $createdBy,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
