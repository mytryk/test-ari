<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model\Message\Event;

use Mytryk\AriClient\Model\DeviceState;

/**
 * Notification that a device state has changed.
 *
 * @package Mytryk\AriClient\Model\Message\Event
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class DeviceStateChanged extends Event
{
    public DeviceState $deviceState;

    /**
     * Device state object.
     *
     * @return DeviceState
     */
    public function getDeviceState(): DeviceState
    {
        return $this->deviceState;
    }
}
