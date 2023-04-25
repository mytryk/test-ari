<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model\Message\Event;

use Mytryk\AriClient\Model\Endpoint;

/**
 * Endpoint state changed.
 *
 * @package Mytryk\AriClient\Model\Message\Event
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class EndpointStateChange extends Event
{
    public Endpoint $endpoint;

    /**
     * @return Endpoint
     */
    public function getEndpoint(): Endpoint
    {
        return $this->endpoint;
    }
}
