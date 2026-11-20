<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoPaymentResultInput Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoPaymentResultInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.PaymentResultInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'customer_reference_id' => 'string',
        'payment_amount' => 'int',
        'payment_currency' => 'string',
        'payment_reference' => 'string',
        'payment_status' => '\Zendit\Model\DtoPaymentStatus'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'customer_reference_id' => null,
        'payment_amount' => null,
        'payment_currency' => null,
        'payment_reference' => null,
        'payment_status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'customer_reference_id' => false,
        'payment_amount' => false,
        'payment_currency' => false,
        'payment_reference' => false,
        'payment_status' => false
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
        'customer_reference_id' => 'customerReferenceId',
        'payment_amount' => 'paymentAmount',
        'payment_currency' => 'paymentCurrency',
        'payment_reference' => 'paymentReference',
        'payment_status' => 'paymentStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'customer_reference_id' => 'setCustomerReferenceId',
        'payment_amount' => 'setPaymentAmount',
        'payment_currency' => 'setPaymentCurrency',
        'payment_reference' => 'setPaymentReference',
        'payment_status' => 'setPaymentStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'customer_reference_id' => 'getCustomerReferenceId',
        'payment_amount' => 'getPaymentAmount',
        'payment_currency' => 'getPaymentCurrency',
        'payment_reference' => 'getPaymentReference',
        'payment_status' => 'getPaymentStatus'
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
        $this->setIfExists('customer_reference_id', $data ?? [], null);
        $this->setIfExists('payment_amount', $data ?? [], null);
        $this->setIfExists('payment_currency', $data ?? [], null);
        $this->setIfExists('payment_reference', $data ?? [], null);
        $this->setIfExists('payment_status', $data ?? [], null);
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

        if ($this->container['payment_reference'] === null) {
            $invalidProperties[] = "'payment_reference' can't be null";
        }
        if ($this->container['payment_status'] === null) {
            $invalidProperties[] = "'payment_status' can't be null";
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
     * Gets customer_reference_id
     *
     * @return string|null
     */
    public function getCustomerReferenceId()
    {
        return $this->container['customer_reference_id'];
    }

    /**
     * Sets customer_reference_id
     *
     * @param string|null $customer_reference_id customer_reference_id
     *
     * @return self
     */
    public function setCustomerReferenceId($customer_reference_id)
    {
        if (is_null($customer_reference_id)) {
            throw new \InvalidArgumentException('non-nullable customer_reference_id cannot be null');
        }
        $this->container['customer_reference_id'] = $customer_reference_id;

        return $this;
    }

    /**
     * Gets payment_amount
     *
     * @return int|null
     */
    public function getPaymentAmount()
    {
        return $this->container['payment_amount'];
    }

    /**
     * Sets payment_amount
     *
     * @param int|null $payment_amount PaymentAmount is in minor units of PaymentCurrency. The two are sent together or not at all.
     *
     * @return self
     */
    public function setPaymentAmount($payment_amount)
    {
        if (is_null($payment_amount)) {
            throw new \InvalidArgumentException('non-nullable payment_amount cannot be null');
        }
        $this->container['payment_amount'] = $payment_amount;

        return $this;
    }

    /**
     * Gets payment_currency
     *
     * @return string|null
     */
    public function getPaymentCurrency()
    {
        return $this->container['payment_currency'];
    }

    /**
     * Sets payment_currency
     *
     * @param string|null $payment_currency payment_currency
     *
     * @return self
     */
    public function setPaymentCurrency($payment_currency)
    {
        if (is_null($payment_currency)) {
            throw new \InvalidArgumentException('non-nullable payment_currency cannot be null');
        }
        $this->container['payment_currency'] = $payment_currency;

        return $this;
    }

    /**
     * Gets payment_reference
     *
     * @return string
     */
    public function getPaymentReference()
    {
        return $this->container['payment_reference'];
    }

    /**
     * Sets payment_reference
     *
     * @param string $payment_reference PaymentReference is the reference the client returned from the Payment Request webhook.
     *
     * @return self
     */
    public function setPaymentReference($payment_reference)
    {
        if (is_null($payment_reference)) {
            throw new \InvalidArgumentException('non-nullable payment_reference cannot be null');
        }
        $this->container['payment_reference'] = $payment_reference;

        return $this;
    }

    /**
     * Gets payment_status
     *
     * @return \Zendit\Model\DtoPaymentStatus
     */
    public function getPaymentStatus()
    {
        return $this->container['payment_status'];
    }

    /**
     * Sets payment_status
     *
     * @param \Zendit\Model\DtoPaymentStatus $payment_status payment_status
     *
     * @return self
     */
    public function setPaymentStatus($payment_status)
    {
        if (is_null($payment_status)) {
            throw new \InvalidArgumentException('non-nullable payment_status cannot be null');
        }
        $this->container['payment_status'] = $payment_status;

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


