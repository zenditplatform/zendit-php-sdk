<?php

namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoTopupOffer Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoTopupOffer implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.TopupOffer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'cost' => '\Zendit\Model\DtoCost',
        'country' => 'string',
        'created_at' => 'string',
        'data_gb' => 'float',
        'data_unlimited' => 'bool',
        'duration_days' => 'int',
        'enabled' => 'bool',
        'notes' => 'string',
        'offer_id' => 'string',
        'price' => '\Zendit\Model\DtoPrice',
        'price_type' => '\Zendit\Model\DtoPriceType',
        'product_type' => '\Zendit\Model\DtoProductType',
        'regions' => 'string[]',
        'send' => '\Zendit\Model\DtoZend',
        'short_notes' => 'string',
        'sms_number' => 'int',
        'sms_unlimited' => 'bool',
        'sub_types' => 'string[]',
        'updated_at' => 'string',
        'voice_minutes' => 'int',
        'voice_unlimited' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'brand' => null,
        'cost' => null,
        'country' => null,
        'created_at' => null,
        'data_gb' => null,
        'data_unlimited' => null,
        'duration_days' => null,
        'enabled' => null,
        'notes' => null,
        'offer_id' => null,
        'price' => null,
        'price_type' => null,
        'product_type' => null,
        'regions' => null,
        'send' => null,
        'short_notes' => null,
        'sms_number' => null,
        'sms_unlimited' => null,
        'sub_types' => null,
        'updated_at' => null,
        'voice_minutes' => null,
        'voice_unlimited' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'brand' => false,
        'cost' => false,
        'country' => false,
        'created_at' => false,
        'data_gb' => false,
        'data_unlimited' => false,
        'duration_days' => false,
        'enabled' => false,
        'notes' => false,
        'offer_id' => false,
        'price' => false,
        'price_type' => false,
        'product_type' => false,
        'regions' => false,
        'send' => false,
        'short_notes' => false,
        'sms_number' => false,
        'sms_unlimited' => false,
        'sub_types' => false,
        'updated_at' => false,
        'voice_minutes' => false,
        'voice_unlimited' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'brand' => 'brand',
        'cost' => 'cost',
        'country' => 'country',
        'created_at' => 'createdAt',
        'data_gb' => 'dataGB',
        'data_unlimited' => 'dataUnlimited',
        'duration_days' => 'durationDays',
        'enabled' => 'enabled',
        'notes' => 'notes',
        'offer_id' => 'offerId',
        'price' => 'price',
        'price_type' => 'priceType',
        'product_type' => 'productType',
        'regions' => 'regions',
        'send' => 'send',
        'short_notes' => 'shortNotes',
        'sms_number' => 'smsNumber',
        'sms_unlimited' => 'smsUnlimited',
        'sub_types' => 'subTypes',
        'updated_at' => 'updatedAt',
        'voice_minutes' => 'voiceMinutes',
        'voice_unlimited' => 'voiceUnlimited'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brand' => 'setBrand',
        'cost' => 'setCost',
        'country' => 'setCountry',
        'created_at' => 'setCreatedAt',
        'data_gb' => 'setDataGb',
        'data_unlimited' => 'setDataUnlimited',
        'duration_days' => 'setDurationDays',
        'enabled' => 'setEnabled',
        'notes' => 'setNotes',
        'offer_id' => 'setOfferId',
        'price' => 'setPrice',
        'price_type' => 'setPriceType',
        'product_type' => 'setProductType',
        'regions' => 'setRegions',
        'send' => 'setSend',
        'short_notes' => 'setShortNotes',
        'sms_number' => 'setSmsNumber',
        'sms_unlimited' => 'setSmsUnlimited',
        'sub_types' => 'setSubTypes',
        'updated_at' => 'setUpdatedAt',
        'voice_minutes' => 'setVoiceMinutes',
        'voice_unlimited' => 'setVoiceUnlimited'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brand' => 'getBrand',
        'cost' => 'getCost',
        'country' => 'getCountry',
        'created_at' => 'getCreatedAt',
        'data_gb' => 'getDataGb',
        'data_unlimited' => 'getDataUnlimited',
        'duration_days' => 'getDurationDays',
        'enabled' => 'getEnabled',
        'notes' => 'getNotes',
        'offer_id' => 'getOfferId',
        'price' => 'getPrice',
        'price_type' => 'getPriceType',
        'product_type' => 'getProductType',
        'regions' => 'getRegions',
        'send' => 'getSend',
        'short_notes' => 'getShortNotes',
        'sms_number' => 'getSmsNumber',
        'sms_unlimited' => 'getSmsUnlimited',
        'sub_types' => 'getSubTypes',
        'updated_at' => 'getUpdatedAt',
        'voice_minutes' => 'getVoiceMinutes',
        'voice_unlimited' => 'getVoiceUnlimited'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('data_gb', $data ?? [], null);
        $this->setIfExists('data_unlimited', $data ?? [], null);
        $this->setIfExists('duration_days', $data ?? [], null);
        $this->setIfExists('enabled', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
        $this->setIfExists('offer_id', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('price_type', $data ?? [], null);
        $this->setIfExists('product_type', $data ?? [], null);
        $this->setIfExists('regions', $data ?? [], null);
        $this->setIfExists('send', $data ?? [], null);
        $this->setIfExists('short_notes', $data ?? [], null);
        $this->setIfExists('sms_number', $data ?? [], null);
        $this->setIfExists('sms_unlimited', $data ?? [], null);
        $this->setIfExists('sub_types', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('voice_minutes', $data ?? [], null);
        $this->setIfExists('voice_unlimited', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['brand'] === null) {
            $invalidProperties[] = "'brand' can't be null";
        }
        if ($this->container['cost'] === null) {
            $invalidProperties[] = "'cost' can't be null";
        }
        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['data_gb'] === null) {
            $invalidProperties[] = "'data_gb' can't be null";
        }
        if ($this->container['data_unlimited'] === null) {
            $invalidProperties[] = "'data_unlimited' can't be null";
        }
        if ($this->container['duration_days'] === null) {
            $invalidProperties[] = "'duration_days' can't be null";
        }
        if ($this->container['enabled'] === null) {
            $invalidProperties[] = "'enabled' can't be null";
        }
        if ($this->container['notes'] === null) {
            $invalidProperties[] = "'notes' can't be null";
        }
        if ($this->container['offer_id'] === null) {
            $invalidProperties[] = "'offer_id' can't be null";
        }
        if ($this->container['price'] === null) {
            $invalidProperties[] = "'price' can't be null";
        }
        if ($this->container['price_type'] === null) {
            $invalidProperties[] = "'price_type' can't be null";
        }
        if ($this->container['product_type'] === null) {
            $invalidProperties[] = "'product_type' can't be null";
        }
        if ($this->container['regions'] === null) {
            $invalidProperties[] = "'regions' can't be null";
        }
        if ($this->container['send'] === null) {
            $invalidProperties[] = "'send' can't be null";
        }
        if ($this->container['short_notes'] === null) {
            $invalidProperties[] = "'short_notes' can't be null";
        }
        if ($this->container['sms_number'] === null) {
            $invalidProperties[] = "'sms_number' can't be null";
        }
        if ($this->container['sms_unlimited'] === null) {
            $invalidProperties[] = "'sms_unlimited' can't be null";
        }
        if ($this->container['sub_types'] === null) {
            $invalidProperties[] = "'sub_types' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
        }
        if ($this->container['voice_minutes'] === null) {
            $invalidProperties[] = "'voice_minutes' can't be null";
        }
        if ($this->container['voice_unlimited'] === null) {
            $invalidProperties[] = "'voice_unlimited' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string $brand brand
     *
     * @return self
     */
    public function setBrand($brand)
    {
        if (is_null($brand)) {
            throw new \InvalidArgumentException('non-nullable brand cannot be null');
        }
        $this->container['brand'] = $brand;

        return $this;
    }

    /**
     * Gets cost
     *
     * @return \Zendit\Model\DtoCost
     */
    public function getCost()
    {
        return $this->container['cost'];
    }

    /**
     * Sets cost
     *
     * @param \Zendit\Model\DtoCost $cost cost
     *
     * @return self
     */
    public function setCost($cost)
    {
        if (is_null($cost)) {
            throw new \InvalidArgumentException('non-nullable cost cannot be null');
        }
        $this->container['cost'] = $cost;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country country
     *
     * @return self
     */
    public function setCountry($country)
    {
        if (is_null($country)) {
            throw new \InvalidArgumentException('non-nullable country cannot be null');
        }
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets data_gb
     *
     * @return float
     */
    public function getDataGb()
    {
        return $this->container['data_gb'];
    }

    /**
     * Sets data_gb
     *
     * @param float $data_gb data_gb
     *
     * @return self
     */
    public function setDataGb($data_gb)
    {
        if (is_null($data_gb)) {
            throw new \InvalidArgumentException('non-nullable data_gb cannot be null');
        }
        $this->container['data_gb'] = $data_gb;

        return $this;
    }

    /**
     * Gets data_unlimited
     *
     * @return bool
     */
    public function getDataUnlimited()
    {
        return $this->container['data_unlimited'];
    }

    /**
     * Sets data_unlimited
     *
     * @param bool $data_unlimited data_unlimited
     *
     * @return self
     */
    public function setDataUnlimited($data_unlimited)
    {
        if (is_null($data_unlimited)) {
            throw new \InvalidArgumentException('non-nullable data_unlimited cannot be null');
        }
        $this->container['data_unlimited'] = $data_unlimited;

        return $this;
    }

    /**
     * Gets duration_days
     *
     * @return int
     */
    public function getDurationDays()
    {
        return $this->container['duration_days'];
    }

    /**
     * Sets duration_days
     *
     * @param int $duration_days duration_days
     *
     * @return self
     */
    public function setDurationDays($duration_days)
    {
        if (is_null($duration_days)) {
            throw new \InvalidArgumentException('non-nullable duration_days cannot be null');
        }
        $this->container['duration_days'] = $duration_days;

        return $this;
    }

    /**
     * Gets enabled
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->container['enabled'];
    }

    /**
     * Sets enabled
     *
     * @param bool $enabled enabled
     *
     * @return self
     */
    public function setEnabled($enabled)
    {
        if (is_null($enabled)) {
            throw new \InvalidArgumentException('non-nullable enabled cannot be null');
        }
        $this->container['enabled'] = $enabled;

        return $this;
    }

    /**
     * Gets notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     *
     * @param string $notes notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        if (is_null($notes)) {
            throw new \InvalidArgumentException('non-nullable notes cannot be null');
        }
        $this->container['notes'] = $notes;

        return $this;
    }

    /**
     * Gets offer_id
     *
     * @return string
     */
    public function getOfferId()
    {
        return $this->container['offer_id'];
    }

    /**
     * Sets offer_id
     *
     * @param string $offer_id offer_id
     *
     * @return self
     */
    public function setOfferId($offer_id)
    {
        if (is_null($offer_id)) {
            throw new \InvalidArgumentException('non-nullable offer_id cannot be null');
        }
        $this->container['offer_id'] = $offer_id;

        return $this;
    }

    /**
     * Gets price
     *
     * @return \Zendit\Model\DtoPrice
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param \Zendit\Model\DtoPrice $price price
     *
     * @return self
     */
    public function setPrice($price)
    {
        if (is_null($price)) {
            throw new \InvalidArgumentException('non-nullable price cannot be null');
        }
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets price_type
     *
     * @return \Zendit\Model\DtoPriceType
     */
    public function getPriceType()
    {
        return $this->container['price_type'];
    }

    /**
     * Sets price_type
     *
     * @param \Zendit\Model\DtoPriceType $price_type price_type
     *
     * @return self
     */
    public function setPriceType($price_type)
    {
        if (is_null($price_type)) {
            throw new \InvalidArgumentException('non-nullable price_type cannot be null');
        }
        $this->container['price_type'] = $price_type;

        return $this;
    }

    /**
     * Gets product_type
     *
     * @return \Zendit\Model\DtoProductType
     */
    public function getProductType()
    {
        return $this->container['product_type'];
    }

    /**
     * Sets product_type
     *
     * @param \Zendit\Model\DtoProductType $product_type product_type
     *
     * @return self
     */
    public function setProductType($product_type)
    {
        if (is_null($product_type)) {
            throw new \InvalidArgumentException('non-nullable product_type cannot be null');
        }
        $this->container['product_type'] = $product_type;

        return $this;
    }

    /**
     * Gets regions
     *
     * @return string[]
     */
    public function getRegions()
    {
        return $this->container['regions'];
    }

    /**
     * Sets regions
     *
     * @param string[] $regions regions
     *
     * @return self
     */
    public function setRegions($regions)
    {
        if (is_null($regions)) {
            throw new \InvalidArgumentException('non-nullable regions cannot be null');
        }
        $this->container['regions'] = $regions;

        return $this;
    }

    /**
     * Gets send
     *
     * @return \Zendit\Model\DtoZend
     */
    public function getSend()
    {
        return $this->container['send'];
    }

    /**
     * Sets send
     *
     * @param \Zendit\Model\DtoZend $send send
     *
     * @return self
     */
    public function setSend($send)
    {
        if (is_null($send)) {
            throw new \InvalidArgumentException('non-nullable send cannot be null');
        }
        $this->container['send'] = $send;

        return $this;
    }

    /**
     * Gets short_notes
     *
     * @return string
     */
    public function getShortNotes()
    {
        return $this->container['short_notes'];
    }

    /**
     * Sets short_notes
     *
     * @param string $short_notes short_notes
     *
     * @return self
     */
    public function setShortNotes($short_notes)
    {
        if (is_null($short_notes)) {
            throw new \InvalidArgumentException('non-nullable short_notes cannot be null');
        }
        $this->container['short_notes'] = $short_notes;

        return $this;
    }

    /**
     * Gets sms_number
     *
     * @return int
     */
    public function getSmsNumber()
    {
        return $this->container['sms_number'];
    }

    /**
     * Sets sms_number
     *
     * @param int $sms_number sms_number
     *
     * @return self
     */
    public function setSmsNumber($sms_number)
    {
        if (is_null($sms_number)) {
            throw new \InvalidArgumentException('non-nullable sms_number cannot be null');
        }
        $this->container['sms_number'] = $sms_number;

        return $this;
    }

    /**
     * Gets sms_unlimited
     *
     * @return bool
     */
    public function getSmsUnlimited()
    {
        return $this->container['sms_unlimited'];
    }

    /**
     * Sets sms_unlimited
     *
     * @param bool $sms_unlimited sms_unlimited
     *
     * @return self
     */
    public function setSmsUnlimited($sms_unlimited)
    {
        if (is_null($sms_unlimited)) {
            throw new \InvalidArgumentException('non-nullable sms_unlimited cannot be null');
        }
        $this->container['sms_unlimited'] = $sms_unlimited;

        return $this;
    }

    /**
     * Gets sub_types
     *
     * @return string[]
     */
    public function getSubTypes()
    {
        return $this->container['sub_types'];
    }

    /**
     * Sets sub_types
     *
     * @param string[] $sub_types sub_types
     *
     * @return self
     */
    public function setSubTypes($sub_types)
    {
        if (is_null($sub_types)) {
            throw new \InvalidArgumentException('non-nullable sub_types cannot be null');
        }
        $this->container['sub_types'] = $sub_types;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string $updated_at updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            throw new \InvalidArgumentException('non-nullable updated_at cannot be null');
        }
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets voice_minutes
     *
     * @return int
     */
    public function getVoiceMinutes()
    {
        return $this->container['voice_minutes'];
    }

    /**
     * Sets voice_minutes
     *
     * @param int $voice_minutes voice_minutes
     *
     * @return self
     */
    public function setVoiceMinutes($voice_minutes)
    {
        if (is_null($voice_minutes)) {
            throw new \InvalidArgumentException('non-nullable voice_minutes cannot be null');
        }
        $this->container['voice_minutes'] = $voice_minutes;

        return $this;
    }

    /**
     * Gets voice_unlimited
     *
     * @return bool
     */
    public function getVoiceUnlimited()
    {
        return $this->container['voice_unlimited'];
    }

    /**
     * Sets voice_unlimited
     *
     * @param bool $voice_unlimited voice_unlimited
     *
     * @return self
     */
    public function setVoiceUnlimited($voice_unlimited)
    {
        if (is_null($voice_unlimited)) {
            throw new \InvalidArgumentException('non-nullable voice_unlimited cannot be null');
        }
        $this->container['voice_unlimited'] = $voice_unlimited;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


