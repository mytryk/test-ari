<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model;

/**
 * Details of an Asterisk log channel.
 *
 * @package Mytryk\AriClient\Model
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class LogChannel implements ModelInterface
{
    public string $status;

    public string $configuration;

    public string $type;

    public string $channel;

    /**
     * Whether a log type is enabled.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * The various log levels.
     *
     * @return string
     */
    public function getConfiguration(): string
    {
        return $this->configuration;
    }

    /**
     * Types of logs for the log channel.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The log channel path.
     *
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }
}
