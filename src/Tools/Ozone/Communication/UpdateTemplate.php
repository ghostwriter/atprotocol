<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Tools\Ozone\Communication;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;

use const JSON_THROW_ON_ERROR;

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
        UriInterface $pdsUri,
        ?string $id = null,
        ?string $name = null,
        ?string $lang = null,
        ?string $contentMarkdown = null,
        ?string $subject = null,
        ?string $updatedBy = null,
        ?bool $disabled = null,
    ): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $pdsUri->withPath('xrpc/tools.ozone.communication.updateTemplate')
            );

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = \json_encode(\array_filter([
            'id' => $id,
            'name' => $name,
            'lang' => $lang,
            'contentMarkdown' => $contentMarkdown,
            'subject' => $subject,
            'updatedBy' => $updatedBy,
            'disabled' => $disabled,
        ]), JSON_THROW_ON_ERROR);

        return $request->withBody(
            $this->streamFactory->createStream(
                $jsonBody
            )
        );
    }
}
