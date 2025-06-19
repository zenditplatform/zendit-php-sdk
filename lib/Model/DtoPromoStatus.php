<?php
namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoPromoStatus Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoPromoStatus
{
    /**
     * Possible values of this enum
     */
    public const PROMO_STATUS_ACTIVE = 'active';

    public const PROMO_STATUS_EXPIRED = 'expired';

    public const PROMO_STATUS_PENDING = 'pending';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PROMO_STATUS_ACTIVE,
            self::PROMO_STATUS_EXPIRED,
            self::PROMO_STATUS_PENDING
        ];
    }
}


