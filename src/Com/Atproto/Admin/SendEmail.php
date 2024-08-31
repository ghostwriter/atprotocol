<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Com\Atproto\Admin;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

use function array_filter;
use function json_encode;

/**
 * Send email to a user's account email address.
 *
 * @see SendEmailTest
 */
final readonly class SendEmail
{
    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function __invoke(
        UriInterface $uri,
        ?string $recipientDid = null,
        ?string $content = null,
        ?string $senderDid = null,
        ?string $subject = null,
        ?string $comment = null,
    ): RequestInterface {
        $request = $this->requestFactory
            ->createRequest('POST', $uri->withPath('xrpc/com.atproto.admin.sendEmail'));

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        $jsonBody = json_encode(array_filter([
            'recipientDid' => $recipientDid,
            'content' => $content,
            'subject' => $subject,
            'senderDid' => $senderDid,
            'comment' => $comment,
        ]));

        if ($jsonBody === false) {
            throw new RuntimeException('Failed to encode JSON');
        }

        return $request->withBody($this->streamFactory->createStream($jsonBody));
    }
}
