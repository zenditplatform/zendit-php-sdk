<?php
namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoProductType Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoProductType
{
    /**
     * Possible values of this enum
     */
    public const PRODUCT_TYPE_TOPUP = 'TOPUP';

    public const PRODUCT_TYPE_ESIM = 'ESIM';

    public const PRODUCT_TYPE_VOUCHER = 'VOUCHER';

    public const PRODUCT_TYPE_WALLET_RECHARGE = 'WALLET_RECHARGE';

    public const PRODUCT_TYPE_REFUND = 'REFUND';

    public const PRODUCT_TYPE_BULK_CHECKOUT = 'BULK_CHECKOUT';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PRODUCT_TYPE_TOPUP,
            self::PRODUCT_TYPE_ESIM,
            self::PRODUCT_TYPE_VOUCHER,
            self::PRODUCT_TYPE_WALLET_RECHARGE,
            self::PRODUCT_TYPE_REFUND,
            self::PRODUCT_TYPE_BULK_CHECKOUT
        ];
    }
}


