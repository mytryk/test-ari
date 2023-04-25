<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model;

/**
 * Details of an Asterisk module.
 *
 * @package Mytryk\AriClient\Model
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class Module implements ModelInterface
{
    public int $useCount;

    public string $status;

    public string $supportLevel;

    public string $name;

    public string $description;

    /**
     * The number of times this module is being used.
     *
     * @return int
     */
    public function getUseCount(): int
    {
        return $this->useCount;
    }

    /**
     * The running status of this module.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * The support state of this module.
     *
     * @return string
     */
    public function getSupportLevel(): string
    {
        return $this->supportLevel;
    }

    /**
     * The name of this module.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The description of this module.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
