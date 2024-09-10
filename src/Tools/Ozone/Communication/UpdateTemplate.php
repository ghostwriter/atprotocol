<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Communication;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

use function array_filter;
use function json_encode;

/**
 * Administrative action to update an existing communication template. Allows passing partial fields to patch specific fields only.
 *
 * @see UpdateTemplateTest
 */
final readonly class UpdateTemplate
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $uri,
        ?string $id = null,
        ?string $name = null,
        ?string $lang = null,
        ?string $contentMarkdown = null,
        ?string $subject = null,
        ?string $updatedBy = null,
        ?bool $disabled = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $uri->withPath('xrpc/tools.ozone.communication.updateTemplate'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'id' => $id,
            'name' => $name,
            'lang' => $lang,
            'contentMarkdown' => $contentMarkdown,
            'subject' => $subject,
            'updatedBy' => $updatedBy,
            'disabled' => $disabled,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
