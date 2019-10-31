<?php

namespace App\Utils\Enums;

/**
 * Class GeneralTypes
 */
abstract class GeneralTypes
{
    const STATUS_ENABLE  = "enable";
    const STATUS_BLOCKED = "blocked";
    const STATUS_DISABLE = "disable";

    /**
     * @return array
     */
    static public function getStatus()
    {
        return [
            self::STATUS_ENABLE,
            self::STATUS_BLOCKED,
            self::STATUS_DISABLE
        ];
    }
}
