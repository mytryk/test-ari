<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model\Message\Event;

use Mytryk\AriClient\Model\Playback;

/**
 * Event showing the completion of a media playback operation.
 *
 * @package Mytryk\AriClient\Model\Message\Event
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class PlaybackFinished extends Event
{
    public Playback $playback;

    /**
     * Playback control object.
     *
     * @return Playback
     */
    public function getPlayback(): Playback
    {
        return $this->playback;
    }
}
