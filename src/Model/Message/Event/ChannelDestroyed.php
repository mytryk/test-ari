<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model\Message\Event;

use Mytryk\AriClient\Model\Channel;

/**
 * Notification that a channel has been destroyed.
 *
 * @package Mytryk\AriClient\Model\Message\Event
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class ChannelDestroyed extends Event
{
    public int $cause;

    public string $causeTxt;

    public Channel $channel;

    /**
     * Integer representation of the cause of the hangup.
     *
     * @return int
     */
    public function getCause(): int
    {
        return $this->cause;
    }

    /**
     * Text representation of the cause of the hangup.
     *
     * @return string
     */
    public function getCauseTxt(): string
    {
        return $this->causeTxt;
    }

    /**
     * @return Channel
     */
    public function getChannel(): Channel
    {
        return $this->channel;
    }
}
