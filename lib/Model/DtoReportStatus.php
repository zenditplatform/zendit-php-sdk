<?php
namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoReportStatus Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoReportStatus
{
    /**
     * Possible values of this enum
     */
    public const REPORT_STATUS_REQUESTED = 'REQUESTED';

    public const REPORT_STATUS_IN_PROGRESS = 'IN_PROGRESS';

    public const REPORT_STATUS_READY = 'READY';

    public const REPORT_STATUS_FAILED = 'FAILED';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::REPORT_STATUS_REQUESTED,
            self::REPORT_STATUS_IN_PROGRESS,
            self::REPORT_STATUS_READY,
            self::REPORT_STATUS_FAILED
        ];
    }
}


