<?php

namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoValueType Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoValueType
{
    /**
     * Possible values of this enum
     */
    public const ValueTypeZend = 'ZEND';

    public const ValueTypePrice = 'PRICE';

    public const ValueTypeCost = 'COST';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ValueTypeZend,
            self::ValueTypePrice,
            self::ValueTypeCost
        ];
    }
}


