<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol;

use Ghostwriter\AtProtocol\Com\Atproto\Server\CreateSession;
use Ghostwriter\AtProtocol\Trait\HttpTrait;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UploadedFileInterface;
use SensitiveParameter;
use Throwable;

/** @see AtProtocolTest */
final class AtProtocol
{
    use HttpTrait;

    public CreateSession $createSession;

    /**
     * @throws Throwable
     */
    public function createSession(string $username, #[SensitiveParameter] string $password): ResponseInterface
    {
        return $this->sendRequest(($this->createSession)($this->uri, $username, $password));
    }

    /**
     * @throws Throwable
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param list<UploadedFileInterface> $attachments
     *
     * @throws Throwable
     */
    public function updateStatus(string $content, array $attachments = []): ResponseInterface
    {
        return $this->post(
            $this->path('xrpc/com.atproto.server.updateStatus'),
            $this->streamFactory->createStream(
                $this->json->encode([
                    'content' => $content,
                    'attachments' => $attachments,
                ])
            ),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8',
            ],
        );
    }
}
