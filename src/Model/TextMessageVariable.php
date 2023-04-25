<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model;

/**
 * A key/value pair variable in a text message.
 *
 * @package Mytryk\AriClient\Model
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class TextMessageVariable implements ModelInterface
{
    public string $key;

    public string $value;

    /**
     * A unique key identifying the variable.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The value of the variable.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
