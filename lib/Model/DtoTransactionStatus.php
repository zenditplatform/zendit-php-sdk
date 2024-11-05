<?php
namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoTransactionStatus Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoTransactionStatus
{
    /**
     * Possible values of this enum
     */
    public const TRANSACTION_STATUS_ACCEPTED = 'ACCEPTED';

    public const TRANSACTION_STATUS_PENDING = 'PENDING';

    public const TRANSACTION_STATUS_AUTHORIZED = 'AUTHORIZED';

    public const TRANSACTION_STATUS_IN_PROGRESS = 'IN_PROGRESS';

    public const TRANSACTION_STATUS_DONE = 'DONE';

    public const TRANSACTION_STATUS_FAILED = 'FAILED';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::TRANSACTION_STATUS_ACCEPTED,
            self::TRANSACTION_STATUS_PENDING,
            self::TRANSACTION_STATUS_AUTHORIZED,
            self::TRANSACTION_STATUS_IN_PROGRESS,
            self::TRANSACTION_STATUS_DONE,
            self::TRANSACTION_STATUS_FAILED
        ];
    }
}


