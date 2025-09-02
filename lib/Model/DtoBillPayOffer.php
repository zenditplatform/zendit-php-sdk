<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoBillPayOffer Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoBillPayOffer implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.BillPayOffer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'bill_retrieval_required_fields' => 'string[]',
        'brand' => 'string',
        'brand_name' => 'string',
        'cost' => '\Zendit\Model\DtoCost',
        'country' => 'string',
        'created_at' => 'string',
        'cutoff_time' => 'string',
        'delivery_speed_seconds' => 'int',
        'enabled' => 'bool',
        'notes' => 'string',
        'offer_id' => 'string',
        'price' => '\Zendit\Model\DtoPrice',
        'price_type' => '\Zendit\Model\DtoPriceType',
        'processing_days' => 'string[]',
        'processing_on_holidays' => 'bool',
        'product_type' => '\Zendit\Model\DtoProductType',
        'regions' => 'string[]',
        'required_fields' => 'string[]',
        'send' => '\Zendit\Model\DtoZend',
        'short_notes' => 'string',
        'sub_types' => 'string[]',
        'supports_bill_retrieval' => 'bool',
        'supports_overpayment' => 'bool',
        'supports_underpayment' => 'bool',
        'updated_at' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'bill_retrieval_required_fields' => null,
        'brand' => null,
        'brand_name' => null,
        'cost' => null,
        'country' => null,
        'created_at' => null,
        'cutoff_time' => null,
        'delivery_speed_seconds' => null,
        'enabled' => null,
        'notes' => null,
        'offer_id' => null,
        'price' => null,
        'price_type' => null,
        'processing_days' => null,
        'processing_on_holidays' => null,
        'product_type' => null,
        'regions' => null,
        'required_fields' => null,
        'send' => null,
        'short_notes' => null,
        'sub_types' => null,
        'supports_bill_retrieval' => null,
        'supports_overpayment' => null,
        'supports_underpayment' => null,
        'updated_at' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'bill_retrieval_required_fields' => false,
        'brand' => false,
        'brand_name' => false,
        'cost' => false,
        'country' => false,
        'created_at' => false,
        'cutoff_time' => false,
        'delivery_speed_seconds' => false,
        'enabled' => false,
        'notes' => false,
        'offer_id' => false,
        'price' => false,
        'price_type' => false,
        'processing_days' => false,
        'processing_on_holidays' => false,
        'product_type' => false,
        'regions' => false,
        'required_fields' => false,
        'send' => false,
        'short_notes' => false,
        'sub_types' => false,
        'supports_bill_retrieval' => false,
        'supports_overpayment' => false,
        'supports_underpayment' => false,
        'updated_at' => false
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
        'bill_retrieval_required_fields' => 'billRetrievalRequiredFields',
        'brand' => 'brand',
        'brand_name' => 'brandName',
        'cost' => 'cost',
        'country' => 'country',
        'created_at' => 'createdAt',
        'cutoff_time' => 'cutoffTime',
        'delivery_speed_seconds' => 'deliverySpeedSeconds',
        'enabled' => 'enabled',
        'notes' => 'notes',
        'offer_id' => 'offerId',
        'price' => 'price',
        'price_type' => 'priceType',
        'processing_days' => 'processingDays',
        'processing_on_holidays' => 'processingOnHolidays',
        'product_type' => 'productType',
        'regions' => 'regions',
        'required_fields' => 'requiredFields',
        'send' => 'send',
        'short_notes' => 'shortNotes',
        'sub_types' => 'subTypes',
        'supports_bill_retrieval' => 'supportsBillRetrieval',
        'supports_overpayment' => 'supportsOverpayment',
        'supports_underpayment' => 'supportsUnderpayment',
        'updated_at' => 'updatedAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'bill_retrieval_required_fields' => 'setBillRetrievalRequiredFields',
        'brand' => 'setBrand',
        'brand_name' => 'setBrandName',
        'cost' => 'setCost',
        'country' => 'setCountry',
        'created_at' => 'setCreatedAt',
        'cutoff_time' => 'setCutoffTime',
        'delivery_speed_seconds' => 'setDeliverySpeedSeconds',
        'enabled' => 'setEnabled',
        'notes' => 'setNotes',
        'offer_id' => 'setOfferId',
        'price' => 'setPrice',
        'price_type' => 'setPriceType',
        'processing_days' => 'setProcessingDays',
        'processing_on_holidays' => 'setProcessingOnHolidays',
        'product_type' => 'setProductType',
        'regions' => 'setRegions',
        'required_fields' => 'setRequiredFields',
        'send' => 'setSend',
        'short_notes' => 'setShortNotes',
        'sub_types' => 'setSubTypes',
        'supports_bill_retrieval' => 'setSupportsBillRetrieval',
        'supports_overpayment' => 'setSupportsOverpayment',
        'supports_underpayment' => 'setSupportsUnderpayment',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'bill_retrieval_required_fields' => 'getBillRetrievalRequiredFields',
        'brand' => 'getBrand',
        'brand_name' => 'getBrandName',
        'cost' => 'getCost',
        'country' => 'getCountry',
        'created_at' => 'getCreatedAt',
        'cutoff_time' => 'getCutoffTime',
        'delivery_speed_seconds' => 'getDeliverySpeedSeconds',
        'enabled' => 'getEnabled',
        'notes' => 'getNotes',
        'offer_id' => 'getOfferId',
        'price' => 'getPrice',
        'price_type' => 'getPriceType',
        'processing_days' => 'getProcessingDays',
        'processing_on_holidays' => 'getProcessingOnHolidays',
        'product_type' => 'getProductType',
        'regions' => 'getRegions',
        'required_fields' => 'getRequiredFields',
        'send' => 'getSend',
        'short_notes' => 'getShortNotes',
        'sub_types' => 'getSubTypes',
        'supports_bill_retrieval' => 'getSupportsBillRetrieval',
        'supports_overpayment' => 'getSupportsOverpayment',
        'supports_underpayment' => 'getSupportsUnderpayment',
        'updated_at' => 'getUpdatedAt'
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
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('bill_retrieval_required_fields', $data ?? [], null);
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('brand_name', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('cutoff_time', $data ?? [], null);
        $this->setIfExists('delivery_speed_seconds', $data ?? [], null);
        $this->setIfExists('enabled', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
        $this->setIfExists('offer_id', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('price_type', $data ?? [], null);
        $this->setIfExists('processing_days', $data ?? [], null);
        $this->setIfExists('processing_on_holidays', $data ?? [], null);
        $this->setIfExists('product_type', $data ?? [], null);
        $this->setIfExists('regions', $data ?? [], null);
        $this->setIfExists('required_fields', $data ?? [], null);
        $this->setIfExists('send', $data ?? [], null);
        $this->setIfExists('short_notes', $data ?? [], null);
        $this->setIfExists('sub_types', $data ?? [], null);
        $this->setIfExists('supports_bill_retrieval', $data ?? [], null);
        $this->setIfExists('supports_overpayment', $data ?? [], null);
        $this->setIfExists('supports_underpayment', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
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

        if ($this->container['bill_retrieval_required_fields'] === null) {
            $invalidProperties[] = "'bill_retrieval_required_fields' can't be null";
        }
        if ($this->container['brand'] === null) {
            $invalidProperties[] = "'brand' can't be null";
        }
        if ($this->container['brand_name'] === null) {
            $invalidProperties[] = "'brand_name' can't be null";
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
        if ($this->container['cutoff_time'] === null) {
            $invalidProperties[] = "'cutoff_time' can't be null";
        }
        if ($this->container['delivery_speed_seconds'] === null) {
            $invalidProperties[] = "'delivery_speed_seconds' can't be null";
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
        if ($this->container['processing_days'] === null) {
            $invalidProperties[] = "'processing_days' can't be null";
        }
        if ($this->container['processing_on_holidays'] === null) {
            $invalidProperties[] = "'processing_on_holidays' can't be null";
        }
        if ($this->container['product_type'] === null) {
            $invalidProperties[] = "'product_type' can't be null";
        }
        if ($this->container['regions'] === null) {
            $invalidProperties[] = "'regions' can't be null";
        }
        if ($this->container['required_fields'] === null) {
            $invalidProperties[] = "'required_fields' can't be null";
        }
        if ($this->container['send'] === null) {
            $invalidProperties[] = "'send' can't be null";
        }
        if ($this->container['short_notes'] === null) {
            $invalidProperties[] = "'short_notes' can't be null";
        }
        if ($this->container['sub_types'] === null) {
            $invalidProperties[] = "'sub_types' can't be null";
        }
        if ($this->container['supports_bill_retrieval'] === null) {
            $invalidProperties[] = "'supports_bill_retrieval' can't be null";
        }
        if ($this->container['supports_overpayment'] === null) {
            $invalidProperties[] = "'supports_overpayment' can't be null";
        }
        if ($this->container['supports_underpayment'] === null) {
            $invalidProperties[] = "'supports_underpayment' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
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
     * Gets bill_retrieval_required_fields
     *
     * @return string[]
     */
    public function getBillRetrievalRequiredFields()
    {
        return $this->container['bill_retrieval_required_fields'];
    }

    /**
     * Sets bill_retrieval_required_fields
     *
     * @param string[] $bill_retrieval_required_fields bill_retrieval_required_fields
     *
     * @return self
     */
    public function setBillRetrievalRequiredFields($bill_retrieval_required_fields)
    {
        if (is_null($bill_retrieval_required_fields)) {
            throw new \InvalidArgumentException('non-nullable bill_retrieval_required_fields cannot be null');
        }
        $this->container['bill_retrieval_required_fields'] = $bill_retrieval_required_fields;

        return $this;
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
     * Gets brand_name
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->container['brand_name'];
    }

    /**
     * Sets brand_name
     *
     * @param string $brand_name brand_name
     *
     * @return self
     */
    public function setBrandName($brand_name)
    {
        if (is_null($brand_name)) {
            throw new \InvalidArgumentException('non-nullable brand_name cannot be null');
        }
        $this->container['brand_name'] = $brand_name;

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
     * Gets cutoff_time
     *
     * @return string
     */
    public function getCutoffTime()
    {
        return $this->container['cutoff_time'];
    }

    /**
     * Sets cutoff_time
     *
     * @param string $cutoff_time cutoff_time
     *
     * @return self
     */
    public function setCutoffTime($cutoff_time)
    {
        if (is_null($cutoff_time)) {
            throw new \InvalidArgumentException('non-nullable cutoff_time cannot be null');
        }
        $this->container['cutoff_time'] = $cutoff_time;

        return $this;
    }

    /**
     * Gets delivery_speed_seconds
     *
     * @return int
     */
    public function getDeliverySpeedSeconds()
    {
        return $this->container['delivery_speed_seconds'];
    }

    /**
     * Sets delivery_speed_seconds
     *
     * @param int $delivery_speed_seconds delivery_speed_seconds
     *
     * @return self
     */
    public function setDeliverySpeedSeconds($delivery_speed_seconds)
    {
        if (is_null($delivery_speed_seconds)) {
            throw new \InvalidArgumentException('non-nullable delivery_speed_seconds cannot be null');
        }
        $this->container['delivery_speed_seconds'] = $delivery_speed_seconds;

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
     * @param bool $enabled Common fields (similar to ESimOffer or VoucherOffer)
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
     * Gets processing_days
     *
     * @return string[]
     */
    public function getProcessingDays()
    {
        return $this->container['processing_days'];
    }

    /**
     * Sets processing_days
     *
     * @param string[] $processing_days processing_days
     *
     * @return self
     */
    public function setProcessingDays($processing_days)
    {
        if (is_null($processing_days)) {
            throw new \InvalidArgumentException('non-nullable processing_days cannot be null');
        }
        $this->container['processing_days'] = $processing_days;

        return $this;
    }

    /**
     * Gets processing_on_holidays
     *
     * @return bool
     */
    public function getProcessingOnHolidays()
    {
        return $this->container['processing_on_holidays'];
    }

    /**
     * Sets processing_on_holidays
     *
     * @param bool $processing_on_holidays processing_on_holidays
     *
     * @return self
     */
    public function setProcessingOnHolidays($processing_on_holidays)
    {
        if (is_null($processing_on_holidays)) {
            throw new \InvalidArgumentException('non-nullable processing_on_holidays cannot be null');
        }
        $this->container['processing_on_holidays'] = $processing_on_holidays;

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
     * Gets required_fields
     *
     * @return string[]
     */
    public function getRequiredFields()
    {
        return $this->container['required_fields'];
    }

    /**
     * Sets required_fields
     *
     * @param string[] $required_fields required_fields
     *
     * @return self
     */
    public function setRequiredFields($required_fields)
    {
        if (is_null($required_fields)) {
            throw new \InvalidArgumentException('non-nullable required_fields cannot be null');
        }
        $this->container['required_fields'] = $required_fields;

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
     * Gets supports_bill_retrieval
     *
     * @return bool
     */
    public function getSupportsBillRetrieval()
    {
        return $this->container['supports_bill_retrieval'];
    }

    /**
     * Sets supports_bill_retrieval
     *
     * @param bool $supports_bill_retrieval supports_bill_retrieval
     *
     * @return self
     */
    public function setSupportsBillRetrieval($supports_bill_retrieval)
    {
        if (is_null($supports_bill_retrieval)) {
            throw new \InvalidArgumentException('non-nullable supports_bill_retrieval cannot be null');
        }
        $this->container['supports_bill_retrieval'] = $supports_bill_retrieval;

        return $this;
    }

    /**
     * Gets supports_overpayment
     *
     * @return bool
     */
    public function getSupportsOverpayment()
    {
        return $this->container['supports_overpayment'];
    }

    /**
     * Sets supports_overpayment
     *
     * @param bool $supports_overpayment supports_overpayment
     *
     * @return self
     */
    public function setSupportsOverpayment($supports_overpayment)
    {
        if (is_null($supports_overpayment)) {
            throw new \InvalidArgumentException('non-nullable supports_overpayment cannot be null');
        }
        $this->container['supports_overpayment'] = $supports_overpayment;

        return $this;
    }

    /**
     * Gets supports_underpayment
     *
     * @return bool
     */
    public function getSupportsUnderpayment()
    {
        return $this->container['supports_underpayment'];
    }

    /**
     * Sets supports_underpayment
     *
     * @param bool $supports_underpayment supports_underpayment
     *
     * @return self
     */
    public function setSupportsUnderpayment($supports_underpayment)
    {
        if (is_null($supports_underpayment)) {
            throw new \InvalidArgumentException('non-nullable supports_underpayment cannot be null');
        }
        $this->container['supports_underpayment'] = $supports_underpayment;

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


