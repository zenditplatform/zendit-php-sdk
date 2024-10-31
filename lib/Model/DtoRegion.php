<?php
namespace Zendit\Model;
use \Zendit\ObjectSerializer;

/**
 * DtoRegion Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class DtoRegion
{
    /**
     * Possible values of this enum
     */
    public const REGION_AFRICA = 'Africa';

    public const REGION_ASIA = 'Asia';

    public const REGION_CARIBBEAN = 'Caribbean';

    public const REGION_CENTRAL_AMERICA = 'Central America';

    public const REGION_EASTERN_EUROPE = 'Eastern Europe';

    public const REGION_GLOBAL = 'Global';

    public const REGION_MIDDLE_EAST_AND_NORTH_AFRICA = 'Middle East and North Africa';

    public const REGION_NORTH_AMERICA = 'North America';

    public const REGION_OCEANIA = 'Oceania';

    public const REGION_SOUTH_AMERICA = 'South America';

    public const REGION_SOUTH_ASIA = 'South Asia';

    public const REGION_SOUTHEAST_ASIA = 'Southeast Asia';

    public const REGION_WESTERN_EUROPE = 'Western Europe';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::REGION_AFRICA,
            self::REGION_ASIA,
            self::REGION_CARIBBEAN,
            self::REGION_CENTRAL_AMERICA,
            self::REGION_EASTERN_EUROPE,
            self::REGION_GLOBAL,
            self::REGION_MIDDLE_EAST_AND_NORTH_AFRICA,
            self::REGION_NORTH_AMERICA,
            self::REGION_OCEANIA,
            self::REGION_SOUTH_AMERICA,
            self::REGION_SOUTH_ASIA,
            self::REGION_SOUTHEAST_ASIA,
            self::REGION_WESTERN_EUROPE
        ];
    }
}


