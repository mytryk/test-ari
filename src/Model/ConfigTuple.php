<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model;

/**
 * A key/value pair that makes up part of a configuration object.
 *
 * @package Mytryk\AriClient\Model
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class ConfigTuple implements ModelInterface
{
    public string $attribute;

    public string $value;

    /**
     * A configuration object attribute.
     *
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * The value for the attribute.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
