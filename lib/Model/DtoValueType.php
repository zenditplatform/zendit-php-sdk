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
    public const VALUE_TYPE_ZEND = 'ZEND';

    public const VALUE_TYPE_PRICE = 'PRICE';

    public const VALUE_TYPE_COST = 'COST';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::VALUE_TYPE_ZEND,
            self::VALUE_TYPE_PRICE,
            self::VALUE_TYPE_COST
        ];
    }
}


