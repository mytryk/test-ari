<?php

/** @copyright 2020 ng-voice GmbH */

declare(strict_types=1);

namespace Mytryk\AriClient\Model;

/**
 * Effective user/group id
 *
 * @package Mytryk\AriClient\Model
 *
 * @author Lukas Stermann <lukas@ng-voice.com>
 */
class SetId implements ModelInterface
{
    public string $group;

    public string $user;

    /**
     * Effective group id.
     *
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * Effective user id.
     *
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }
}
