<?php

namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoPriceType Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoPriceType
{
    /**
     * Possible values of this enum
     */
    public const PriceTypeFixed = 'FIXED';

    public const PriceTypeRange = 'RANGE';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PriceTypeFixed,
            self::PriceTypeRange
        ];
    }
}


