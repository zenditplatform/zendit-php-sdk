<?php
namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoPaymentStatus Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoPaymentStatus
{
    /**
     * Possible values of this enum
     */
    public const PAYMENT_STATUS_SUCCESS = 'SUCCESS';

    public const PAYMENT_STATUS_FAILURE = 'FAILURE';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PAYMENT_STATUS_SUCCESS,
            self::PAYMENT_STATUS_FAILURE
        ];
    }
}


