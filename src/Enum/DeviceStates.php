<?php

/**
 * @copyright 2020 ng-voice GmbH
 *
 * @noinspection UnknownInspectionInspection Plugin [EA] does not
 * recognize the noinspection annotation of PhpStorm
 * @noinspection PhpUnused Some of these constants are just helpful for a user,
 * not for the library itself
 */

declare(strict_types=1);

namespace Mytryk\AriClient\Enum;

/**
 * Enum of possible Asterisk device states.
 *
 * @package Mytryk\AriClient\Enum
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class DeviceStates
{
    public const NOT_INUSE = 'NOT_INUSE';

    public const INUSE = 'INUSE';

    public const BUSY = 'BUSY';

    public const INVALID = 'INVALID';

    public const UNAVAILABLE = 'UNAVAILABLE';

    public const RINGING = 'RINGING';

    public const RING_INUSE = 'RINGINUSE';

    public const ON_HOLD = 'ONHOLD';
}
