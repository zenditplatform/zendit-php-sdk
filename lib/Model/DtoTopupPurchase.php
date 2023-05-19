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
        'cost' => 'int',
        'cost_currency' => 'string',
        'country' => 'string',
        'created_at' => 'string',
        'error' => '\Zendit\Model\DtoError',
        'log' => '\Zendit\Model\DtoTransactionLogItem[]',
        'notes' => 'string',
        'offer_id' => 'string',
        'price' => 'int',
        'price_currency' => 'string',
        'price_type' => '\Zendit\Model\DtoPriceType',
        'product_type' => '\Zendit\Model\DtoProductType',
        'recipient_phone_number' => 'string',
        'send' => 'int',
        'send_currency' => 'string',
        'sender' => '\Zendit\Model\DtoTopupSender',
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
        'cost' => null,
        'cost_currency' => null,
        'country' => null,
        'created_at' => null,
        'error' => null,
        'log' => null,
        'notes' => null,
        'offer_id' => null,
        'price' => null,
        'price_currency' => null,
        'price_type' => null,
        'product_type' => null,
        'recipient_phone_number' => null,
        'send' => null,
        'send_currency' => null,
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
		'cost' => false,
		'cost_currency' => false,
		'country' => false,
		'created_at' => false,
		'error' => false,
		'log' => false,
		'notes' => false,
		'offer_id' => false,
		'price' => false,
		'price_currency' => false,
		'price_type' => false,
		'product_type' => false,
		'recipient_phone_number' => false,
		'send' => false,
		'send_currency' => false,
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
        'cost' => 'cost',
        'cost_currency' => 'costCurrency',
        'country' => 'country',
        'created_at' => 'createdAt',
        'error' => 'error',
        'log' => 'log',
        'notes' => 'notes',
        'offer_id' => 'offerId',
        'price' => 'price',
        'price_currency' => 'priceCurrency',
        'price_type' => 'priceType',
        'product_type' => 'productType',
        'recipient_phone_number' => 'recipientPhoneNumber',
        'send' => 'send',
        'send_currency' => 'sendCurrency',
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
        'cost' => 'setCost',
        'cost_currency' => 'setCostCurrency',
        'country' => 'setCountry',
        'created_at' => 'setCreatedAt',
        'error' => 'setError',
        'log' => 'setLog',
        'notes' => 'setNotes',
        'offer_id' => 'setOfferId',
        'price' => 'setPrice',
        'price_currency' => 'setPriceCurrency',
        'price_type' => 'setPriceType',
        'product_type' => 'setProductType',
        'recipient_phone_number' => 'setRecipientPhoneNumber',
        'send' => 'setSend',
        'send_currency' => 'setSendCurrency',
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
        'cost' => 'getCost',
        'cost_currency' => 'getCostCurrency',
        'country' => 'getCountry',
        'created_at' => 'getCreatedAt',
        'error' => 'getError',
        'log' => 'getLog',
        'notes' => 'getNotes',
        'offer_id' => 'getOfferId',
        'price' => 'getPrice',
        'price_currency' => 'getPriceCurrency',
        'price_type' => 'getPriceType',
        'product_type' => 'getProductType',
        'recipient_phone_number' => 'getRecipientPhoneNumber',
        'send' => 'getSend',
        'send_currency' => 'getSendCurrency',
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
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('cost_currency', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('error', $data ?? [], null);
        $this->setIfExists('log', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
        $this->setIfExists('offer_id', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('price_currency', $data ?? [], null);
        $this->setIfExists('price_type', $data ?? [], null);
        $this->setIfExists('product_type', $data ?? [], null);
        $this->setIfExists('recipient_phone_number', $data ?? [], null);
        $this->setIfExists('send', $data ?? [], null);
        $this->setIfExists('send_currency', $data ?? [], null);
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
     * @return string|null
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string|null $brand brand
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
     * @return int|null
     */
    public function getCost()
    {
        return $this->container['cost'];
    }

    /**
     * Sets cost
     *
     * @param int|null $cost cost
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
     * @return string|null
     */
    public function getCostCurrency()
    {
        return $this->container['cost_currency'];
    }

    /**
     * Sets cost_currency
     *
     * @param string|null $cost_currency cost_currency
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
     * @return string|null
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string|null $country country
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
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string|null $created_at created_at
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
     * Gets log
     *
     * @return \Zendit\Model\DtoTransactionLogItem[]|null
     */
    public function getLog()
    {
        return $this->container['log'];
    }

    /**
     * Sets log
     *
     * @param \Zendit\Model\DtoTransactionLogItem[]|null $log log
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
     * @return string|null
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     *
     * @param string|null $notes notes
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
     * @return string|null
     */
    public function getOfferId()
    {
        return $this->container['offer_id'];
    }

    /**
     * Sets offer_id
     *
     * @param string|null $offer_id offer_id
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
     * @return int|null
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param int|null $price price
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
     * @return string|null
     */
    public function getPriceCurrency()
    {
        return $this->container['price_currency'];
    }

    /**
     * Sets price_currency
     *
     * @param string|null $price_currency price_currency
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
     * @return \Zendit\Model\DtoPriceType|null
     */
    public function getPriceType()
    {
        return $this->container['price_type'];
    }

    /**
     * Sets price_type
     *
     * @param \Zendit\Model\DtoPriceType|null $price_type price_type
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
     * @return \Zendit\Model\DtoProductType|null
     */
    public function getProductType()
    {
        return $this->container['product_type'];
    }

    /**
     * Sets product_type
     *
     * @param \Zendit\Model\DtoProductType|null $product_type product_type
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
     * @return string|null
     */
    public function getRecipientPhoneNumber()
    {
        return $this->container['recipient_phone_number'];
    }

    /**
     * Sets recipient_phone_number
     *
     * @param string|null $recipient_phone_number recipient_phone_number
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
     * Gets send
     *
     * @return int|null
     */
    public function getSend()
    {
        return $this->container['send'];
    }

    /**
     * Sets send
     *
     * @param int|null $send send
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
     * @return string|null
     */
    public function getSendCurrency()
    {
        return $this->container['send_currency'];
    }

    /**
     * Sets send_currency
     *
     * @param string|null $send_currency send_currency
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
     * @return \Zendit\Model\DtoTopupSender|null
     */
    public function getSender()
    {
        return $this->container['sender'];
    }

    /**
     * Sets sender
     *
     * @param \Zendit\Model\DtoTopupSender|null $sender sender
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
     * @return string|null
     */
    public function getShortNotes()
    {
        return $this->container['short_notes'];
    }

    /**
     * Sets short_notes
     *
     * @param string|null $short_notes short_notes
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
     * @return \Zendit\Model\DtoTransactionStatus|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Zendit\Model\DtoTransactionStatus|null $status status
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
     * @return string[]|null
     */
    public function getSubTypes()
    {
        return $this->container['sub_types'];
    }

    /**
     * Sets sub_types
     *
     * @param string[]|null $sub_types sub_types
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
     * @return string|null
     */
    public function getTransactionId()
    {
        return $this->container['transaction_id'];
    }

    /**
     * Sets transaction_id
     *
     * @param string|null $transaction_id transaction_id
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
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string|null $updated_at updated_at
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


