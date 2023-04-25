<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Client\Rest\Resource;

use JsonException;
use Mytryk\AriClient\Client\Rest\AbstractRestClient;
use Mytryk\AriClient\Enum\HttpMethods;
use Mytryk\AriClient\Exception\AsteriskRestInterfaceException;
use Mytryk\AriClient\Model\{AsteriskInfo, AsteriskPing, ConfigTuple, LogChannel, Module, Variable};

/**
 * An implementation of the Asterisk REST client for the
 * Asterisk REST Interface
 *
 * @see https://wiki.asterisk.org/wiki/display/AST/Asterisk+16+Asterisk+REST+API
 *
 * @package Mytryk\AriClient\Client\Rest\Resource
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class Asterisk extends AbstractRestClient
{
    /**
     * Retrieve a dynamic configuration object.
     *
     * @param string $configClass The configuration class containing dynamic
     *     configuration objects.
     * @param string $objectType The type of configuration object to retrieve.
     * @param string $id The unique identifier of the object to retrieve.
     *
     * @return ConfigTuple[]
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     * @throws JsonException
     */
    public function getObject(string $configClass, string $objectType, string $id): array
    {
        $response = $this->sendRequest(
            HttpMethods::GET,
            "/asterisk/config/dynamic/{$configClass}/{$objectType}/{$id}"
        );

        /** @var ConfigTuple[] $configTuples */
        $configTuples = [];
        $this->responseToArrayOfAriModelInstances(
            $response,
            new ConfigTuple(),
            $configTuples
        );

        return $configTuples;
    }

    /**
     * Create or update a dynamic configuration object.
     *
     * @param string $configClass The configuration class containing dynamic
     *     configuration objects.
     * @param string $objectType The type of configuration object to create or update.
     * @param string $id The unique identifier of the object to create or update.
     * @param string[] $fields The body object should have a value that is a list of
     *     ConfigTuples, which provide the fields to update.
     *
     * @return ConfigTuple[]
     *
     * @throws AsteriskRestInterfaceException Default REST Interface Exception by Asterisk
     * @throws JsonException
     */
    public function updateObject(
        string $configClass,
        string $objectType,
        string $id,
        array $fields = []
    ): array {
        $body = ['fields' => []];

        if ($fields !== []) {
            $formattedFields = [];

            foreach ($fields as $attribute => $value) {
                $formattedFields[] = ['attribute' => $attribute, 'value' => $value];
            }

            $body['fields'] = $formattedFields;
        }

        $response = $this->sendRequest(
            HttpMethods::PUT,
            "/asterisk/config/dynamic/{$configClass}/{$objectType}/{$id}",
            [],
            $body
        );

        /** @var ConfigTuple[] $configTuples */
        $configTuples = [];
        $this->responseToArrayOfAriModelInstances(
            $response,
            new ConfigTuple(),
            $configTuples
        );

        return $configTuples;
    }

    /**
     * Delete a dynamic configuration object.
     *
     * @param string $configClass The configuration class containing dynamic
     *     configuration objects.
     * @param string $objectType The type of configuration object to delete.
     * @param string $id The unique identifier of the object to delete.
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     */
    public function deleteObject(
        string $configClass,
        string $objectType,
        string $id
    ): void {
        $this->sendRequest(
            HttpMethods::DELETE,
            "/asterisk/config/dynamic/{$configClass}/{$objectType}/{$id}"
        );
    }

    /**
     * Gets Asterisk system information.
     *
     * @param array<int, string> $only Filter information returned. Allowed values: build, system,
     *     config, status.
     *
     * @return AsteriskInfo
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     * @throws JsonException
     */
    public function getInfo(array $only = []): AsteriskInfo
    {
        $queryParameters = [];
        if ($only !== []) {
            $queryParameters = ['only' => implode(',', $only)];
        }

        $response = $this->sendRequest(
            HttpMethods::GET,
            '/asterisk/info',
            $queryParameters
        );

        $asteriskInfo = new AsteriskInfo();
        $this->responseToAriModelInstance($response, $asteriskInfo);

        return $asteriskInfo;
    }

    /**
     * Response pong message.
     *
     * @return AsteriskPing
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     * @throws JsonException
     */
    public function ping(): AsteriskPing
    {
        $response = $this->sendRequest(HttpMethods::GET, '/asterisk/ping');

        $asteriskPing = new AsteriskPing();
        $this->responseToAriModelInstance($response, $asteriskPing);

        return $asteriskPing;
    }

    /**
     * List Asterisk modules.
     *
     * @return Module[]
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     * @throws JsonException
     */
    public function listModules(): array
    {
        $response = $this->sendRequest(HttpMethods::GET, '/asterisk/modules');

        /** @var Module[] $modules */
        $modules = [];
        $this->responseToArrayOfAriModelInstances(
            $response,
            new Module(),
            $modules
        );

        return $modules;
    }

    /**
     * Get Asterisk module information.
     *
     * @param string $moduleName Module's name.
     *
     * @return Module
     *
     * @throws AsteriskRestInterfaceException Default in case the REST request fails
     * @throws JsonException
     */
    public function getModule(string $moduleName): Module
    {
        $response = $this->sendRequest(
            HttpMethods::GET,
            "/asterisk/modules/{$moduleName}"
        );

        $module = new Module();
        $this->responseToAriModelInstance($response, $module);

        return $module;
    }

    /**
     * Load an Asterisk module.
     *
     * @param string $moduleName Module's name.
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     */
    public function loadModule(string $moduleName): void
    {
        $this->sendRequest(HttpMethods::POST, "/asterisk/modules/{$moduleName}");
    }

    /**
     * Unload an Asterisk module.
     *
     * @param string $moduleName Module's name.
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     */
    public function unloadModule(string $moduleName): void
    {
        $this->sendRequest(HttpMethods::DELETE, "/asterisk/modules/{$moduleName}");
    }

    /**
     * Reload an Asterisk module.
     *
     * @param string $moduleName Module's name.
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     */
    public function reloadModule(string $moduleName): void
    {
        $this->sendRequest(HttpMethods::PUT, "/asterisk/modules/{$moduleName}");
    }

    /**
     * Gets Asterisk log channel information.
     *
     * @return LogChannel[]
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     * @throws JsonException
     */
    public function listLogChannels(): array
    {
        $response = $this->sendRequest(HttpMethods::GET, 'asterisk/logging');

        $logChannels = [];
        $this->responseToArrayOfAriModelInstances(
            $response,
            new LogChannel(),
            $logChannels
        );

        return $logChannels;
    }

    /**
     * Adds a log channel.
     *
     * @param string $logChannelName The log channel to add.
     * @param string $configuration Levels of the log channel
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     */
    public function addLog(string $logChannelName, string $configuration): void
    {
        $this->sendRequest(
            HttpMethods::POST,
            "/asterisk/logging/{$logChannelName}",
            ['configuration' => $configuration]
        );
    }

    /**
     * Deletes a log channel.
     *
     * @param string $logChannelName Log channels name.
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     */
    public function deleteLog(string $logChannelName): void
    {
        $this->sendRequest(HttpMethods::DELETE, "/asterisk/logging/{$logChannelName}");
    }

    /**
     * Rotates a log channel.
     *
     * @param string $logChannelName Log channel's name.
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     */
    public function rotateLog(string $logChannelName): void
    {
        $this->sendRequest(
            HttpMethods::PUT,
            "/asterisk/logging/{$logChannelName}/rotate"
        );
    }

    /**
     * Get the value of a global variable.
     *
     * @param string $variable The variable to get.
     *
     * @return Variable
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     * @throws JsonException
     */
    public function getGlobalVar(string $variable): Variable
    {
        $response = $this->sendRequest(
            HttpMethods::GET,
            '/asterisk/variable',
            ['variable' => $variable]
        );

        $variableObject = new Variable();
        $this->responseToAriModelInstance($response, $variableObject);

        return $variableObject;
    }

    /**
     * Set the value of a global variable.
     *
     * @param string $variable The variable to set.
     * @param string $value The value to set the variable to.
     *
     * @throws AsteriskRestInterfaceException in case the REST request fails
     */
    public function setGlobalVar(string $variable, string $value): void
    {
        $this->sendRequest(
            HttpMethods::POST,
            '/asterisk/variable',
            ['variable' => $variable, 'value' => $value]
        );
    }
}
