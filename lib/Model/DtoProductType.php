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
    public const ProductTypeTopup = 'TOPUP';

    public const ProductTypeESIM = 'ESIM';

    public const ProductTypeVoucher = 'VOUCHER';

    public const ProductTypeRechargeSandbox = 'RECHARGE_SANDBOX';

    public const ProductTypeRechargeWithCreditCard = 'RECHARGE_WITH_CREDIT_CARD';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ProductTypeTopup,
            self::ProductTypeESIM,
            self::ProductTypeVoucher,
            self::ProductTypeRechargeSandbox,
            self::ProductTypeRechargeWithCreditCard
        ];
    }
}


