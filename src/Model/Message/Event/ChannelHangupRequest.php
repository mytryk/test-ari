<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model\Message\Event;

use Mytryk\AriClient\Model\Channel;

/**
 * A hangup was requested on the channel.
 *
 * @package Mytryk\AriClient\Model\Message\Event
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class ChannelHangupRequest extends Event
{
    public ?bool $soft = null;

    public ?int $cause = null;

    public Channel $channel;

    /**
     * Whether the hangup request was a soft hangup request.
     *
     * @return bool|null
     */
    public function isSoft(): ?bool
    {
        return $this->soft;
    }

    /**
     * Integer representation of the cause of the hangup.
     *
     * @return int|null
     */
    public function getCause(): ?int
    {
        return $this->cause;
    }

    /**
     * The channel on which the hangup was requested.
     *
     * @return Channel
     */
    public function getChannel(): Channel
    {
        return $this->channel;
    }
}
