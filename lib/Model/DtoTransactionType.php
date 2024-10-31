<?php
namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoTransactionType Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoTransactionType
{
    /**
     * Possible values of this enum
     */
    public const CREDIT = 'CREDIT';

    public const DEBIT = 'DEBIT';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::CREDIT,
            self::DEBIT
        ];
    }
}


