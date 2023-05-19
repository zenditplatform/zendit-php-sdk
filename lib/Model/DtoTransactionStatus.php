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
    public const TransactionStatusAccepted = 'ACCEPTED';

    public const TransactionStatusPending = 'PENDING';

    public const TransactionStatusAuthorized = 'AUTHORIZED';

    public const TransactionStatusInProgress = 'IN_PROGRESS';

    public const TransactionStatusDone = 'DONE';

    public const TransactionStatusFailed = 'FAILED';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::TransactionStatusAccepted,
            self::TransactionStatusPending,
            self::TransactionStatusAuthorized,
            self::TransactionStatusInProgress,
            self::TransactionStatusDone,
            self::TransactionStatusFailed
        ];
    }
}


