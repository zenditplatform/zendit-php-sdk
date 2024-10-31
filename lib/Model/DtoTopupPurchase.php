<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoTopupPurchase Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoTopupPurchase implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.TopupPurchase';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'brand_name' => 'string',
        'confirmation' => '\Zendit\Model\DtoConfirmation',
        'cost' => 'int',
        'cost_currency' => 'string',
        'country' => 'string',
        'created_at' => 'string',
        'data_gb' => 'float',
        'data_unlimited' => 'bool',
        'duration_days' => 'int',
        'error' => '\Zendit\Model\DtoError',
        'log' => '\Zendit\Model\DtoTransactionLogItem[]',
        'notes' => 'string',
        'offer_id' => 'string',
        'price' => 'int',
        'price_currency' => 'string',
        'price_type' => '\Zendit\Model\DtoPriceType',
        'product_type' => '\Zendit\Model\DtoProductType',
        'recipient_phone_number' => 'string',
        'regions' => 'string[]',
        'send' => 'int',
        'send_currency' => 'string',
        'sender' => '\Zendit\Model\DtoTopupSender',
        'short_notes' => 'string',
        'sms_number' => 'int',
        'sms_unlimited' => 'bool',
        'status' => '\Zendit\Model\DtoTransactionStatus',
        'sub_types' => 'string[]',
        'transaction_id' => 'string',
        'updated_at' => 'string',
        'value' => '\Zendit\Model\DtoPurchaseValue',
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
        'brand_name' => null,
        'confirmation' => null,
        'cost' => null,
        'cost_currency' => null,
        'country' => null,
        'created_at' => null,
        'data_gb' => null,
        'data_unlimited' => null,
        'duration_days' => null,
        'error' => null,
        'log' => null,
        'notes' => null,
        'offer_id' => null,
        'price' => null,
        'price_currency' => null,
        'price_type' => null,
        'product_type' => null,
        'recipient_phone_number' => null,
        'regions' => null,
        'send' => null,
        'send_currency' => null,
        'sender' => null,
        'short_notes' => null,
        'sms_number' => null,
        'sms_unlimited' => null,
        'status' => null,
        'sub_types' => null,
        'transaction_id' => null,
        'updated_at' => null,
        'value' => null,
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
        'brand_name' => false,
        'confirmation' => false,
        'cost' => false,
        'cost_currency' => false,
        'country' => false,
        'created_at' => false,
        'data_gb' => false,
        'data_unlimited' => false,
        'duration_days' => false,
        'error' => false,
        'log' => false,
        'notes' => false,
        'offer_id' => false,
        'price' => false,
        'price_currency' => false,
        'price_type' => false,
        'product_type' => false,
        'recipient_phone_number' => false,
        'regions' => false,
        'send' => false,
        'send_currency' => false,
        'sender' => false,
        'short_notes' => false,
        'sms_number' => false,
        'sms_unlimited' => false,
        'status' => false,
        'sub_types' => false,
        'transaction_id' => false,
        'updated_at' => false,
        'value' => false,
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
        'brand_name' => 'brandName',
        'confirmation' => 'confirmation',
        'cost' => 'cost',
        'cost_currency' => 'costCurrency',
        'country' => 'country',
        'created_at' => 'createdAt',
        'data_gb' => 'dataGB',
        'data_unlimited' => 'dataUnlimited',
        'duration_days' => 'durationDays',
        'error' => 'error',
        'log' => 'log',
        'notes' => 'notes',
        'offer_id' => 'offerId',
        'price' => 'price',
        'price_currency' => 'priceCurrency',
        'price_type' => 'priceType',
        'product_type' => 'productType',
        'recipient_phone_number' => 'recipientPhoneNumber',
        'regions' => 'regions',
        'send' => 'send',
        'send_currency' => 'sendCurrency',
        'sender' => 'sender',
        'short_notes' => 'shortNotes',
        'sms_number' => 'smsNumber',
        'sms_unlimited' => 'smsUnlimited',
        'status' => 'status',
        'sub_types' => 'subTypes',
        'transaction_id' => 'transactionId',
        'updated_at' => 'updatedAt',
        'value' => 'value',
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
        'brand_name' => 'setBrandName',
        'confirmation' => 'setConfirmation',
        'cost' => 'setCost',
        'cost_currency' => 'setCostCurrency',
        'country' => 'setCountry',
        'created_at' => 'setCreatedAt',
        'data_gb' => 'setDataGb',
        'data_unlimited' => 'setDataUnlimited',
        'duration_days' => 'setDurationDays',
        'error' => 'setError',
        'log' => 'setLog',
        'notes' => 'setNotes',
        'offer_id' => 'setOfferId',
        'price' => 'setPrice',
        'price_currency' => 'setPriceCurrency',
        'price_type' => 'setPriceType',
        'product_type' => 'setProductType',
        'recipient_phone_number' => 'setRecipientPhoneNumber',
        'regions' => 'setRegions',
        'send' => 'setSend',
        'send_currency' => 'setSendCurrency',
        'sender' => 'setSender',
        'short_notes' => 'setShortNotes',
        'sms_number' => 'setSmsNumber',
        'sms_unlimited' => 'setSmsUnlimited',
        'status' => 'setStatus',
        'sub_types' => 'setSubTypes',
        'transaction_id' => 'setTransactionId',
        'updated_at' => 'setUpdatedAt',
        'value' => 'setValue',
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
        'brand_name' => 'getBrandName',
        'confirmation' => 'getConfirmation',
        'cost' => 'getCost',
        'cost_currency' => 'getCostCurrency',
        'country' => 'getCountry',
        'created_at' => 'getCreatedAt',
        'data_gb' => 'getDataGb',
        'data_unlimited' => 'getDataUnlimited',
        'duration_days' => 'getDurationDays',
        'error' => 'getError',
        'log' => 'getLog',
        'notes' => 'getNotes',
        'offer_id' => 'getOfferId',
        'price' => 'getPrice',
        'price_currency' => 'getPriceCurrency',
        'price_type' => 'getPriceType',
        'product_type' => 'getProductType',
        'recipient_phone_number' => 'getRecipientPhoneNumber',
        'regions' => 'getRegions',
        'send' => 'getSend',
        'send_currency' => 'getSendCurrency',
        'sender' => 'getSender',
        'short_notes' => 'getShortNotes',
        'sms_number' => 'getSmsNumber',
        'sms_unlimited' => 'getSmsUnlimited',
        'status' => 'getStatus',
        'sub_types' => 'getSubTypes',
        'transaction_id' => 'getTransactionId',
        'updated_at' => 'getUpdatedAt',
        'value' => 'getValue',
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
        $this->setIfExists('brand_name', $data ?? [], null);
        $this->setIfExists('confirmation', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('cost_currency', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('data_gb', $data ?? [], null);
        $this->setIfExists('data_unlimited', $data ?? [], null);
        $this->setIfExists('duration_days', $data ?? [], null);
        $this->setIfExists('error', $data ?? [], null);
        $this->setIfExists('log', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
        $this->setIfExists('offer_id', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('price_currency', $data ?? [], null);
        $this->setIfExists('price_type', $data ?? [], null);
        $this->setIfExists('product_type', $data ?? [], null);
        $this->setIfExists('recipient_phone_number', $data ?? [], null);
        $this->setIfExists('regions', $data ?? [], null);
        $this->setIfExists('send', $data ?? [], null);
        $this->setIfExists('send_currency', $data ?? [], null);
        $this->setIfExists('sender', $data ?? [], null);
        $this->setIfExists('short_notes', $data ?? [], null);
        $this->setIfExists('sms_number', $data ?? [], null);
        $this->setIfExists('sms_unlimited', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('sub_types', $data ?? [], null);
        $this->setIfExists('transaction_id', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('value', $data ?? [], null);
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
        if ($this->container['brand_name'] === null) {
            $invalidProperties[] = "'brand_name' can't be null";
        }
        if ($this->container['cost'] === null) {
            $invalidProperties[] = "'cost' can't be null";
        }
        if ($this->container['cost_currency'] === null) {
            $invalidProperties[] = "'cost_currency' can't be null";
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
        if ($this->container['price_type'] === null) {
            $invalidProperties[] = "'price_type' can't be null";
        }
        if ($this->container['product_type'] === null) {
            $invalidProperties[] = "'product_type' can't be null";
        }
        if ($this->container['recipient_phone_number'] === null) {
            $invalidProperties[] = "'recipient_phone_number' can't be null";
        }
        if ($this->container['send'] === null) {
            $invalidProperties[] = "'send' can't be null";
        }
        if ($this->container['send_currency'] === null) {
            $invalidProperties[] = "'send_currency' can't be null";
        }
        if ($this->container['sender'] === null) {
            $invalidProperties[] = "'sender' can't be null";
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
     * Gets confirmation
     *
     * @return \Zendit\Model\DtoConfirmation|null
     */
    public function getConfirmation()
    {
        return $this->container['confirmation'];
    }

    /**
     * Sets confirmation
     *
     * @param \Zendit\Model\DtoConfirmation|null $confirmation confirmation
     *
     * @return self
     */
    public function setConfirmation($confirmation)
    {
        if (is_null($confirmation)) {
            throw new \InvalidArgumentException('non-nullable confirmation cannot be null');
        }
        $this->container['confirmation'] = $confirmation;

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
     * Gets recipient_phone_number
     *
     * @return string
     */
    public function getRecipientPhoneNumber()
    {
        return $this->container['recipient_phone_number'];
    }

    /**
     * Sets recipient_phone_number
     *
     * @param string $recipient_phone_number recipient_phone_number
     *
     * @return self
     */
    public function setRecipientPhoneNumber($recipient_phone_number)
    {
        if (is_null($recipient_phone_number)) {
            throw new \InvalidArgumentException('non-nullable recipient_phone_number cannot be null');
        }
        $this->container['recipient_phone_number'] = $recipient_phone_number;

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
     * Gets sender
     *
     * @return \Zendit\Model\DtoTopupSender
     */
    public function getSender()
    {
        return $this->container['sender'];
    }

    /**
     * Sets sender
     *
     * @param \Zendit\Model\DtoTopupSender $sender sender
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


