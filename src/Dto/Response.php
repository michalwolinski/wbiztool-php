<?php


namespace Haxmedia\WbizTool\Dto;


use Haxmedia\WbizTool\Exception\WbizToolException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 * @package Haxmedia\WbizTool\Dto
 */
class Response
{
    /**
     * @var bool
     */
    private bool $status;
    /**
     * @var string
     */
    private string $message;
    /**
     * @var int|null
     */
    private ?int $messageId;

    /**
     * Response constructor.
     *
     * @param int $status
     * @param string $message
     * @param int|null $messageId
     */
    public function __construct(int $status, string $message, ?int $messageId = null)
    {
        $this->status    = $status === 1;
        $this->message   = $message;
        $this->messageId = $messageId;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return Response
     * @throws WbizToolException
     */
    public static function fromResponse(ResponseInterface $response): Response
    {
        $data = json_decode(
            $response->getBody()->getContents()
        );

        if (is_object($data) === false) {
            throw new WbizToolException('Response is invalid');
        }

        return new self(
            $data->status,
            $data->message,
            $data->msg_id ??= null
        );
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status'    => $this->getStatus(),
            'message'   => $this->getMessage(),
            'messageId' => $this->getMessageId()
        ];
    }
}