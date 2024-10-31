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
    public const PRICE_TYPE_FIXED = 'FIXED';

    public const PRICE_TYPE_RANGE = 'RANGE';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PRICE_TYPE_FIXED,
            self::PRICE_TYPE_RANGE
        ];
    }
}


