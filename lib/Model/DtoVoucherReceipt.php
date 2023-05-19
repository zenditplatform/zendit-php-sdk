<?php

namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoVoucherReceipt Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoVoucherReceipt
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.VoucherReceipt';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'currency' => 'string',
        'epin' => 'string',
        'expires_at' => 'string',
        'instructions' => 'string',
        'notes' => 'string',
        'recipient_customer_service_number' => 'string',
        'send' => 'int',
        'sender_customer_service_number' => 'string',
        'terms' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'currency' => null,
        'epin' => null,
        'expires_at' => null,
        'instructions' => null,
        'notes' => null,
        'recipient_customer_service_number' => null,
        'send' => null,
        'sender_customer_service_number' => null,
        'terms' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'currency' => false,
		'epin' => false,
		'expires_at' => false,
		'instructions' => false,
		'notes' => false,
		'recipient_customer_service_number' => false,
		'send' => false,
		'sender_customer_service_number' => false,
		'terms' => false
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
    protected static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    protected static function openAPIFormats()
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
    protected static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    protected function isNullableSetToNull(string $property): bool
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
        'currency' => 'currency',
        'epin' => 'epin',
        'expires_at' => 'expiresAt',
        'instructions' => 'instructions',
        'notes' => 'notes',
        'recipient_customer_service_number' => 'recipientCustomerServiceNumber',
        'send' => 'send',
        'sender_customer_service_number' => 'senderCustomerServiceNumber',
        'terms' => 'terms'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'currency' => 'setCurrency',
        'epin' => 'setEpin',
        'expires_at' => 'setExpiresAt',
        'instructions' => 'setInstructions',
        'notes' => 'setNotes',
        'recipient_customer_service_number' => 'setRecipientCustomerServiceNumber',
        'send' => 'setSend',
        'sender_customer_service_number' => 'setSenderCustomerServiceNumber',
        'terms' => 'setTerms'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'currency' => 'getCurrency',
        'epin' => 'getEpin',
        'expires_at' => 'getExpiresAt',
        'instructions' => 'getInstructions',
        'notes' => 'getNotes',
        'recipient_customer_service_number' => 'getRecipientCustomerServiceNumber',
        'send' => 'getSend',
        'sender_customer_service_number' => 'getSenderCustomerServiceNumber',
        'terms' => 'getTerms'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    protected static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    protected static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    protected static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    protected function getModelName()
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
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('epin', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('instructions', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
        $this->setIfExists('recipient_customer_service_number', $data ?? [], null);
        $this->setIfExists('send', $data ?? [], null);
        $this->setIfExists('sender_customer_service_number', $data ?? [], null);
        $this->setIfExists('terms', $data ?? [], null);
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
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency The 3-letter ISO currency code for the send
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets epin
     *
     * @return string|null
     */
    public function getEpin()
    {
        return $this->container['epin'];
    }

    /**
     * Sets epin
     *
     * @param string|null $epin epin
     *
     * @return self
     */
    public function setEpin($epin)
    {
        if (is_null($epin)) {
            throw new \InvalidArgumentException('non-nullable epin cannot be null');
        }
        $this->container['epin'] = $epin;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return string|null
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param string|null $expires_at expires_at
     *
     * @return self
     */
    public function setExpiresAt($expires_at)
    {
        if (is_null($expires_at)) {
            throw new \InvalidArgumentException('non-nullable expires_at cannot be null');
        }
        $this->container['expires_at'] = $expires_at;

        return $this;
    }

    /**
     * Gets instructions
     *
     * @return string|null
     */
    public function getInstructions()
    {
        return $this->container['instructions'];
    }

    /**
     * Sets instructions
     *
     * @param string|null $instructions instructions
     *
     * @return self
     */
    public function setInstructions($instructions)
    {
        if (is_null($instructions)) {
            throw new \InvalidArgumentException('non-nullable instructions cannot be null');
        }
        $this->container['instructions'] = $instructions;

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
     * @param string|null $notes Additional message information about the voucher
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
     * Gets recipient_customer_service_number
     *
     * @return string|null
     */
    public function getRecipientCustomerServiceNumber()
    {
        return $this->container['recipient_customer_service_number'];
    }

    /**
     * Sets recipient_customer_service_number
     *
     * @param string|null $recipient_customer_service_number recipient_customer_service_number
     *
     * @return self
     */
    public function setRecipientCustomerServiceNumber($recipient_customer_service_number)
    {
        if (is_null($recipient_customer_service_number)) {
            throw new \InvalidArgumentException('non-nullable recipient_customer_service_number cannot be null');
        }
        $this->container['recipient_customer_service_number'] = $recipient_customer_service_number;

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
     * @param int|null $send The value delivered by the voucher
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
     * Gets sender_customer_service_number
     *
     * @return string|null
     */
    public function getSenderCustomerServiceNumber()
    {
        return $this->container['sender_customer_service_number'];
    }

    /**
     * Sets sender_customer_service_number
     *
     * @param string|null $sender_customer_service_number sender_customer_service_number
     *
     * @return self
     */
    public function setSenderCustomerServiceNumber($sender_customer_service_number)
    {
        if (is_null($sender_customer_service_number)) {
            throw new \InvalidArgumentException('non-nullable sender_customer_service_number cannot be null');
        }
        $this->container['sender_customer_service_number'] = $sender_customer_service_number;

        return $this;
    }

    /**
     * Gets terms
     *
     * @return string|null
     */
    public function getTerms()
    {
        return $this->container['terms'];
    }

    /**
     * Sets terms
     *
     * @param string|null $terms terms
     *
     * @return self
     */
    public function setTerms($terms)
    {
        if (is_null($terms)) {
            throw new \InvalidArgumentException('non-nullable terms cannot be null');
        }
        $this->container['terms'] = $terms;

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


