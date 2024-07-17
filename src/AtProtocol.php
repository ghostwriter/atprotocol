<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol;

use Ghostwriter\AtProtocol\Trait\HttpTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UploadedFileInterface;

use function json_encode;

/** @see AtProtocolTest */
final class AtProtocol
{
    use HttpTrait;

    public $createSession;

    public function createSession(string $username, string $password): ResponseInterface
    {
        // replace this block of code with a separate class
        return $this->httpClient->sendRequest(($this->createSession)($username, $password));
    }

    /**
     * @param array<UploadedFileInterface> $attachments
     */
    public function updateStatus(string $content, array $attachments = []): ResponseInterface
    {
        return $this->post(
            $this->path('xrpc/com.atproto.server.updateStatus'),
            json_encode([
                'content' => $content,
                'attachments' => $attachments,
            ]) ?: '',
            [
                'Accept' => 'application/json',
                // 'Content-Type' => 'application/json; charset=utf-8',
            ]
        );
    }
}
