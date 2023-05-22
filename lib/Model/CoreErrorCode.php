<?php

namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * CoreErrorCode Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class CoreErrorCode
{
    /**
     * Possible values of this enum
     */
    public const ErrorCodeNotAssigned = '';

    public const errorCodeNative = 'native';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ErrorCodeNotAssigned,
            self::errorCodeNative
        ];
    }
}


