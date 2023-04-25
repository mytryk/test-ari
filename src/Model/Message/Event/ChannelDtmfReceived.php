<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model\Message\Event;

use Mytryk\AriClient\Model\Channel;

/**
 * DTMF received on a channel.
 *
 * This event is sent when the DTMF ends.
 * There is no notification about the start of DTMF.
 *
 * @package Mytryk\AriClient\Model\Message\Event
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class ChannelDtmfReceived extends Event
{
    public int $durationMs;

    public string $digit;

    public Channel $channel;

    /**
     * Number of milliseconds DTMF was received.
     *
     * @return int
     */
    public function getDurationMs(): int
    {
        return $this->durationMs;
    }

    /**
     * DTMF digit received (0-9, A-E, # or *).
     *
     * @return string
     */
    public function getDigit(): string
    {
        return $this->digit;
    }

    /**
     * The channel on which DTMF was received.
     *
     * @return Channel
     */
    public function getChannel(): Channel
    {
        return $this->channel;
    }
}
