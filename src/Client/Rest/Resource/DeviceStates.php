<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Client\Rest\Resource;

use JsonException;
use Mytryk\AriClient\Client\Rest\AbstractRestClient;
use Mytryk\AriClient\Enum\HttpMethods;
use Mytryk\AriClient\Exception\AsteriskRestInterfaceException;
use Mytryk\AriClient\Model\DeviceState;

/**
 * An implementation of the DeviceStates REST client for the
 * Asterisk REST Interface
 *
 * @see https://wiki.asterisk.org/wiki/display/AST/Asterisk+16+DeviceStates+REST+API
 *
 * @package Mytryk\AriClient\Client\Rest\Resource
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class DeviceStates extends AbstractRestClient
{
    /**
     * List all ARI controlled device states.
     *
     * @return DeviceState[]
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails.
     * @throws JsonException
     */
    public function list(): array
    {
        $response = $this->sendRequest(HttpMethods::GET, '/deviceStates/');

        $deviceStates = [];
        $this->responseToArrayOfAriModelInstances(
            $response,
            new DeviceState(),
            $deviceStates
        );

        return $deviceStates;
    }

    /**
     * Retrieve the current state of a device.
     *
     * @param string $deviceName Name of the device
     *
     * @return DeviceState
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails.
     * @throws JsonException
     */
    public function get(string $deviceName): DeviceState
    {
        $response = $this->sendRequest(
            HttpMethods::GET,
            "/deviceStates/{$deviceName}"
        );

        $deviceState = new DeviceState();
        $this->responseToAriModelInstance($response, $deviceState);

        return $deviceState;
    }

    /**
     * Change the state of a device controlled by ARI. (Note - implicitly creates the
     * device state).
     *
     * @param string $deviceName Name of the device
     * @param string $deviceState Allowed: NOT_INUSE, INUSE, BUSY, INVALID, UNAVAILABLE,
     *     RINGING, RINGINUSE, ONHOLD
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails.
     */
    public function update(string $deviceName, string $deviceState): void
    {
        $this->sendRequest(
            HttpMethods::PUT,
            "/deviceStates/{$deviceName}",
            [],
            ['deviceState' => $deviceState]
        );
    }

    /**
     * Destroy a device-state controlled by ARI.
     *
     * @param string $deviceName Name of the device
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails.
     */
    public function delete(string $deviceName): void
    {
        $this->sendRequest(HttpMethods::DELETE, "/deviceStates/{$deviceName}");
    }
}
