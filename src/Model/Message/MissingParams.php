<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model\Message;

/**
 * Error event sent when required params are missing.
 *
 * @package Mytryk\AriClient\Model\Message\Event
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class MissingParams extends Message
{
    /**
     * @var array<int, string>
     */
    public array $params;

    /**
     * A list of the missing parameters.
     *
     * @return array<int, string>
     */
    public function getParams(): array
    {
        return $this->params;
    }
}
