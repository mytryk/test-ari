<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model;

/**
 * A text message.
 *
 * @package Mytryk\AriClient\Model
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class TextMessage implements ModelInterface
{
    public string $body;

    public string $from;

    public string $to;

    /**
     * @var array<int, TextMessageVariable>
     */
    public array $variables = [];

    /**
     * The text of the message.
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * A technology specific URI specifying the source of the message.
     *
     * For sip and pjsip technologies, any SIP URI can be specified. For xmpp,
     * the URI must correspond to the client connection being used to send the message.
     *
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * A technology specific URI specifying the destination of the message.
     *
     * Valid technologies include sip, pjsip, and xmp.
     * The destination of a message should be an endpoint.
     *
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * Technology specific key/value pairs associated with the message.
     *
     * @return array<int, TextMessageVariable>
     */
    public function getVariables(): array
    {
        return $this->variables;
    }
}
