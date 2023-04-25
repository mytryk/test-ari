<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model\Message\Event;

use Mytryk\AriClient\Model\Channel;

/**
 * Talking was detected on the channel.
 *
 * @package Mytryk\AriClient\Model\Message\Event
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class ChannelTalkingStarted extends Event
{
    public Channel $channel;

    /**
     * The channel on which talking started.
     *
     * @return Channel
     */
    public function getChannel(): Channel
    {
        return $this->channel;
    }
}
