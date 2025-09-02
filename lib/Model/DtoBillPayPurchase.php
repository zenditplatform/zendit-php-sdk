<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoBillPayPurchase Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoBillPayPurchase implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.BillPayPurchase';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'brand_name' => 'string',
        'cost' => 'int',
        'cost_base' => 'int',
        'cost_currency' => 'string',
        'cost_currency_divisor' => 'int',
        'cost_fee' => 'int',
        'country' => 'string',
        'created_at' => 'string',
        'error' => '\Zendit\Model\DtoError',
        'fields' => '\Zendit\Model\DtoPurchaseField[]',
        'log' => '\Zendit\Model\DtoTransactionLogItem[]',
        'notes' => 'string',
        'offer_id' => 'string',
        'price' => 'int',
        'price_currency' => 'string',
        'price_currency_divisor' => 'int',
        'price_type' => '\Zendit\Model\DtoPriceType',
        'product_type' => '\Zendit\Model\DtoProductType',
        'recipient' => '\Zendit\Model\DtoRecipient',
        'regions' => 'string[]',
        'send' => 'int',
        'send_currency' => 'string',
        'send_currency_divisor' => 'int',
        'sender' => '\Zendit\Model\DtoSender',
        'short_notes' => 'string',
        'status' => '\Zendit\Model\DtoTransactionStatus',
        'sub_types' => 'string[]',
        'transaction_id' => 'string',
        'updated_at' => 'string',
        'value' => '\Zendit\Model\DtoPurchaseValue'
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
        'brand_name' => null,
        'cost' => null,
        'cost_base' => null,
        'cost_currency' => null,
        'cost_currency_divisor' => null,
        'cost_fee' => null,
        'country' => null,
        'created_at' => null,
        'error' => null,
        'fields' => null,
        'log' => null,
        'notes' => null,
        'offer_id' => null,
        'price' => null,
        'price_currency' => null,
        'price_currency_divisor' => null,
        'price_type' => null,
        'product_type' => null,
        'recipient' => null,
        'regions' => null,
        'send' => null,
        'send_currency' => null,
        'send_currency_divisor' => null,
        'sender' => null,
        'short_notes' => null,
        'status' => null,
        'sub_types' => null,
        'transaction_id' => null,
        'updated_at' => null,
        'value' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'brand' => false,
        'brand_name' => false,
        'cost' => false,
        'cost_base' => false,
        'cost_currency' => false,
        'cost_currency_divisor' => false,
        'cost_fee' => false,
        'country' => false,
        'created_at' => false,
        'error' => false,
        'fields' => false,
        'log' => false,
        'notes' => false,
        'offer_id' => false,
        'price' => false,
        'price_currency' => false,
        'price_currency_divisor' => false,
        'price_type' => false,
        'product_type' => false,
        'recipient' => false,
        'regions' => false,
        'send' => false,
        'send_currency' => false,
        'send_currency_divisor' => false,
        'sender' => false,
        'short_notes' => false,
        'status' => false,
        'sub_types' => false,
        'transaction_id' => false,
        'updated_at' => false,
        'value' => false
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
        'brand_name' => 'brandName',
        'cost' => 'cost',
        'cost_base' => 'costBase',
        'cost_currency' => 'costCurrency',
        'cost_currency_divisor' => 'costCurrencyDivisor',
        'cost_fee' => 'costFee',
        'country' => 'country',
        'created_at' => 'createdAt',
        'error' => 'error',
        'fields' => 'fields',
        'log' => 'log',
        'notes' => 'notes',
        'offer_id' => 'offerId',
        'price' => 'price',
        'price_currency' => 'priceCurrency',
        'price_currency_divisor' => 'priceCurrencyDivisor',
        'price_type' => 'priceType',
        'product_type' => 'productType',
        'recipient' => 'recipient',
        'regions' => 'regions',
        'send' => 'send',
        'send_currency' => 'sendCurrency',
        'send_currency_divisor' => 'sendCurrencyDivisor',
        'sender' => 'sender',
        'short_notes' => 'shortNotes',
        'status' => 'status',
        'sub_types' => 'subTypes',
        'transaction_id' => 'transactionId',
        'updated_at' => 'updatedAt',
        'value' => 'value'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brand' => 'setBrand',
        'brand_name' => 'setBrandName',
        'cost' => 'setCost',
        'cost_base' => 'setCostBase',
        'cost_currency' => 'setCostCurrency',
        'cost_currency_divisor' => 'setCostCurrencyDivisor',
        'cost_fee' => 'setCostFee',
        'country' => 'setCountry',
        'created_at' => 'setCreatedAt',
        'error' => 'setError',
        'fields' => 'setFields',
        'log' => 'setLog',
        'notes' => 'setNotes',
        'offer_id' => 'setOfferId',
        'price' => 'setPrice',
        'price_currency' => 'setPriceCurrency',
        'price_currency_divisor' => 'setPriceCurrencyDivisor',
        'price_type' => 'setPriceType',
        'product_type' => 'setProductType',
        'recipient' => 'setRecipient',
        'regions' => 'setRegions',
        'send' => 'setSend',
        'send_currency' => 'setSendCurrency',
        'send_currency_divisor' => 'setSendCurrencyDivisor',
        'sender' => 'setSender',
        'short_notes' => 'setShortNotes',
        'status' => 'setStatus',
        'sub_types' => 'setSubTypes',
        'transaction_id' => 'setTransactionId',
        'updated_at' => 'setUpdatedAt',
        'value' => 'setValue'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brand' => 'getBrand',
        'brand_name' => 'getBrandName',
        'cost' => 'getCost',
        'cost_base' => 'getCostBase',
        'cost_currency' => 'getCostCurrency',
        'cost_currency_divisor' => 'getCostCurrencyDivisor',
        'cost_fee' => 'getCostFee',
        'country' => 'getCountry',
        'created_at' => 'getCreatedAt',
        'error' => 'getError',
        'fields' => 'getFields',
        'log' => 'getLog',
        'notes' => 'getNotes',
        'offer_id' => 'getOfferId',
        'price' => 'getPrice',
        'price_currency' => 'getPriceCurrency',
        'price_currency_divisor' => 'getPriceCurrencyDivisor',
        'price_type' => 'getPriceType',
        'product_type' => 'getProductType',
        'recipient' => 'getRecipient',
        'regions' => 'getRegions',
        'send' => 'getSend',
        'send_currency' => 'getSendCurrency',
        'send_currency_divisor' => 'getSendCurrencyDivisor',
        'sender' => 'getSender',
        'short_notes' => 'getShortNotes',
        'status' => 'getStatus',
        'sub_types' => 'getSubTypes',
        'transaction_id' => 'getTransactionId',
        'updated_at' => 'getUpdatedAt',
        'value' => 'getValue'
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
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('brand_name', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('cost_base', $data ?? [], null);
        $this->setIfExists('cost_currency', $data ?? [], null);
        $this->setIfExists('cost_currency_divisor', $data ?? [], null);
        $this->setIfExists('cost_fee', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('error', $data ?? [], null);
        $this->setIfExists('fields', $data ?? [], null);
        $this->setIfExists('log', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
        $this->setIfExists('offer_id', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('price_currency', $data ?? [], null);
        $this->setIfExists('price_currency_divisor', $data ?? [], null);
        $this->setIfExists('price_type', $data ?? [], null);
        $this->setIfExists('product_type', $data ?? [], null);
        $this->setIfExists('recipient', $data ?? [], null);
        $this->setIfExists('regions', $data ?? [], null);
        $this->setIfExists('send', $data ?? [], null);
        $this->setIfExists('send_currency', $data ?? [], null);
        $this->setIfExists('send_currency_divisor', $data ?? [], null);
        $this->setIfExists('sender', $data ?? [], null);
        $this->setIfExists('short_notes', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('sub_types', $data ?? [], null);
        $this->setIfExists('transaction_id', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('value', $data ?? [], null);
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
        if ($this->container['brand_name'] === null) {
            $invalidProperties[] = "'brand_name' can't be null";
        }
        if ($this->container['cost'] === null) {
            $invalidProperties[] = "'cost' can't be null";
        }
        if ($this->container['cost_base'] === null) {
            $invalidProperties[] = "'cost_base' can't be null";
        }
        if ($this->container['cost_currency'] === null) {
            $invalidProperties[] = "'cost_currency' can't be null";
        }
        if ($this->container['cost_currency_divisor'] === null) {
            $invalidProperties[] = "'cost_currency_divisor' can't be null";
        }
        if ($this->container['cost_fee'] === null) {
            $invalidProperties[] = "'cost_fee' can't be null";
        }
        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['fields'] === null) {
            $invalidProperties[] = "'fields' can't be null";
        }
        if ($this->container['log'] === null) {
            $invalidProperties[] = "'log' can't be null";
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
        if ($this->container['price_currency'] === null) {
            $invalidProperties[] = "'price_currency' can't be null";
        }
        if ($this->container['price_currency_divisor'] === null) {
            $invalidProperties[] = "'price_currency_divisor' can't be null";
        }
        if ($this->container['price_type'] === null) {
            $invalidProperties[] = "'price_type' can't be null";
        }
        if ($this->container['product_type'] === null) {
            $invalidProperties[] = "'product_type' can't be null";
        }
        if ($this->container['recipient'] === null) {
            $invalidProperties[] = "'recipient' can't be null";
        }
        if ($this->container['send'] === null) {
            $invalidProperties[] = "'send' can't be null";
        }
        if ($this->container['send_currency'] === null) {
            $invalidProperties[] = "'send_currency' can't be null";
        }
        if ($this->container['send_currency_divisor'] === null) {
            $invalidProperties[] = "'send_currency_divisor' can't be null";
        }
        if ($this->container['sender'] === null) {
            $invalidProperties[] = "'sender' can't be null";
        }
        if ($this->container['short_notes'] === null) {
            $invalidProperties[] = "'short_notes' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['sub_types'] === null) {
            $invalidProperties[] = "'sub_types' can't be null";
        }
        if ($this->container['transaction_id'] === null) {
            $invalidProperties[] = "'transaction_id' can't be null";
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
     * @return int
     */
    public function getCost()
    {
        return $this->container['cost'];
    }

    /**
     * Sets cost
     *
     * @param int $cost cost
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
     * Gets cost_base
     *
     * @return int
     */
    public function getCostBase()
    {
        return $this->container['cost_base'];
    }

    /**
     * Sets cost_base
     *
     * @param int $cost_base cost_base
     *
     * @return self
     */
    public function setCostBase($cost_base)
    {
        if (is_null($cost_base)) {
            throw new \InvalidArgumentException('non-nullable cost_base cannot be null');
        }
        $this->container['cost_base'] = $cost_base;

        return $this;
    }

    /**
     * Gets cost_currency
     *
     * @return string
     */
    public function getCostCurrency()
    {
        return $this->container['cost_currency'];
    }

    /**
     * Sets cost_currency
     *
     * @param string $cost_currency cost_currency
     *
     * @return self
     */
    public function setCostCurrency($cost_currency)
    {
        if (is_null($cost_currency)) {
            throw new \InvalidArgumentException('non-nullable cost_currency cannot be null');
        }
        $this->container['cost_currency'] = $cost_currency;

        return $this;
    }

    /**
     * Gets cost_currency_divisor
     *
     * @return int
     */
    public function getCostCurrencyDivisor()
    {
        return $this->container['cost_currency_divisor'];
    }

    /**
     * Sets cost_currency_divisor
     *
     * @param int $cost_currency_divisor cost_currency_divisor
     *
     * @return self
     */
    public function setCostCurrencyDivisor($cost_currency_divisor)
    {
        if (is_null($cost_currency_divisor)) {
            throw new \InvalidArgumentException('non-nullable cost_currency_divisor cannot be null');
        }
        $this->container['cost_currency_divisor'] = $cost_currency_divisor;

        return $this;
    }

    /**
     * Gets cost_fee
     *
     * @return int
     */
    public function getCostFee()
    {
        return $this->container['cost_fee'];
    }

    /**
     * Sets cost_fee
     *
     * @param int $cost_fee cost_fee
     *
     * @return self
     */
    public function setCostFee($cost_fee)
    {
        if (is_null($cost_fee)) {
            throw new \InvalidArgumentException('non-nullable cost_fee cannot be null');
        }
        $this->container['cost_fee'] = $cost_fee;

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
     * Gets error
     *
     * @return \Zendit\Model\DtoError|null
     */
    public function getError()
    {
        return $this->container['error'];
    }

    /**
     * Sets error
     *
     * @param \Zendit\Model\DtoError|null $error error
     *
     * @return self
     */
    public function setError($error)
    {
        if (is_null($error)) {
            throw new \InvalidArgumentException('non-nullable error cannot be null');
        }
        $this->container['error'] = $error;

        return $this;
    }

    /**
     * Gets fields
     *
     * @return \Zendit\Model\DtoPurchaseField[]
     */
    public function getFields()
    {
        return $this->container['fields'];
    }

    /**
     * Sets fields
     *
     * @param \Zendit\Model\DtoPurchaseField[] $fields fields
     *
     * @return self
     */
    public function setFields($fields)
    {
        if (is_null($fields)) {
            throw new \InvalidArgumentException('non-nullable fields cannot be null');
        }
        $this->container['fields'] = $fields;

        return $this;
    }

    /**
     * Gets log
     *
     * @return \Zendit\Model\DtoTransactionLogItem[]
     */
    public function getLog()
    {
        return $this->container['log'];
    }

    /**
     * Sets log
     *
     * @param \Zendit\Model\DtoTransactionLogItem[] $log log
     *
     * @return self
     */
    public function setLog($log)
    {
        if (is_null($log)) {
            throw new \InvalidArgumentException('non-nullable log cannot be null');
        }
        $this->container['log'] = $log;

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
     * @return int
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param int $price price
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
     * Gets price_currency
     *
     * @return string
     */
    public function getPriceCurrency()
    {
        return $this->container['price_currency'];
    }

    /**
     * Sets price_currency
     *
     * @param string $price_currency price_currency
     *
     * @return self
     */
    public function setPriceCurrency($price_currency)
    {
        if (is_null($price_currency)) {
            throw new \InvalidArgumentException('non-nullable price_currency cannot be null');
        }
        $this->container['price_currency'] = $price_currency;

        return $this;
    }

    /**
     * Gets price_currency_divisor
     *
     * @return int
     */
    public function getPriceCurrencyDivisor()
    {
        return $this->container['price_currency_divisor'];
    }

    /**
     * Sets price_currency_divisor
     *
     * @param int $price_currency_divisor price_currency_divisor
     *
     * @return self
     */
    public function setPriceCurrencyDivisor($price_currency_divisor)
    {
        if (is_null($price_currency_divisor)) {
            throw new \InvalidArgumentException('non-nullable price_currency_divisor cannot be null');
        }
        $this->container['price_currency_divisor'] = $price_currency_divisor;

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
     * Gets recipient
     *
     * @return \Zendit\Model\DtoRecipient
     */
    public function getRecipient()
    {
        return $this->container['recipient'];
    }

    /**
     * Sets recipient
     *
     * @param \Zendit\Model\DtoRecipient $recipient recipient
     *
     * @return self
     */
    public function setRecipient($recipient)
    {
        if (is_null($recipient)) {
            throw new \InvalidArgumentException('non-nullable recipient cannot be null');
        }
        $this->container['recipient'] = $recipient;

        return $this;
    }

    /**
     * Gets regions
     *
     * @return string[]|null
     */
    public function getRegions()
    {
        return $this->container['regions'];
    }

    /**
     * Sets regions
     *
     * @param string[]|null $regions regions
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
     * @return int
     */
    public function getSend()
    {
        return $this->container['send'];
    }

    /**
     * Sets send
     *
     * @param int $send send
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
     * Gets send_currency
     *
     * @return string
     */
    public function getSendCurrency()
    {
        return $this->container['send_currency'];
    }

    /**
     * Sets send_currency
     *
     * @param string $send_currency send_currency
     *
     * @return self
     */
    public function setSendCurrency($send_currency)
    {
        if (is_null($send_currency)) {
            throw new \InvalidArgumentException('non-nullable send_currency cannot be null');
        }
        $this->container['send_currency'] = $send_currency;

        return $this;
    }

    /**
     * Gets send_currency_divisor
     *
     * @return int
     */
    public function getSendCurrencyDivisor()
    {
        return $this->container['send_currency_divisor'];
    }

    /**
     * Sets send_currency_divisor
     *
     * @param int $send_currency_divisor send_currency_divisor
     *
     * @return self
     */
    public function setSendCurrencyDivisor($send_currency_divisor)
    {
        if (is_null($send_currency_divisor)) {
            throw new \InvalidArgumentException('non-nullable send_currency_divisor cannot be null');
        }
        $this->container['send_currency_divisor'] = $send_currency_divisor;

        return $this;
    }

    /**
     * Gets sender
     *
     * @return \Zendit\Model\DtoSender
     */
    public function getSender()
    {
        return $this->container['sender'];
    }

    /**
     * Sets sender
     *
     * @param \Zendit\Model\DtoSender $sender sender
     *
     * @return self
     */
    public function setSender($sender)
    {
        if (is_null($sender)) {
            throw new \InvalidArgumentException('non-nullable sender cannot be null');
        }
        $this->container['sender'] = $sender;

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
     * Gets status
     *
     * @return \Zendit\Model\DtoTransactionStatus
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Zendit\Model\DtoTransactionStatus $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

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
     * Gets transaction_id
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->container['transaction_id'];
    }

    /**
     * Sets transaction_id
     *
     * @param string $transaction_id transaction_id
     *
     * @return self
     */
    public function setTransactionId($transaction_id)
    {
        if (is_null($transaction_id)) {
            throw new \InvalidArgumentException('non-nullable transaction_id cannot be null');
        }
        $this->container['transaction_id'] = $transaction_id;

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
     * Gets value
     *
     * @return \Zendit\Model\DtoPurchaseValue|null
     */
    public function getValue()
    {
        return $this->container['value'];
    }

    /**
     * Sets value
     *
     * @param \Zendit\Model\DtoPurchaseValue|null $value value
     *
     * @return self
     */
    public function setValue($value)
    {
        if (is_null($value)) {
            throw new \InvalidArgumentException('non-nullable value cannot be null');
        }
        $this->container['value'] = $value;

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


