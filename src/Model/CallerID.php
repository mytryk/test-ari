<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model;

/**
 * Caller identification
 *
 * @package Mytryk\AriClient\Model
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class CallerID implements ModelInterface
{
    public string $name;

    public string $number;

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the number.
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }
}
