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
class DtoVoucherReceipt implements ModelInterface, ArrayAccess, \JsonSerializable
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
        'account_id' => 'string',
        'confirmation_number' => 'string',
        'currency' => 'string',
        'delivery_type' => 'string',
        'epin' => 'string',
        'expires_at' => 'string',
        'instructions' => 'string',
        'notes' => 'string',
        'recipient_customer_service_number' => 'string',
        'redemption_url' => 'string',
        'send' => 'int',
        'sender_customer_service_number' => 'string',
        'terms' => 'string',
        'voucher_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'account_id' => null,
        'confirmation_number' => null,
        'currency' => null,
        'delivery_type' => null,
        'epin' => null,
        'expires_at' => null,
        'instructions' => null,
        'notes' => null,
        'recipient_customer_service_number' => null,
        'redemption_url' => null,
        'send' => null,
        'sender_customer_service_number' => null,
        'terms' => null,
        'voucher_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'account_id' => false,
        'confirmation_number' => false,
        'currency' => false,
        'delivery_type' => false,
        'epin' => false,
        'expires_at' => false,
        'instructions' => false,
        'notes' => false,
        'recipient_customer_service_number' => false,
        'redemption_url' => false,
        'send' => false,
        'sender_customer_service_number' => false,
        'terms' => false,
        'voucher_id' => false
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
        'account_id' => 'accountId',
        'confirmation_number' => 'confirmationNumber',
        'currency' => 'currency',
        'delivery_type' => 'deliveryType',
        'epin' => 'epin',
        'expires_at' => 'expiresAt',
        'instructions' => 'instructions',
        'notes' => 'notes',
        'recipient_customer_service_number' => 'recipientCustomerServiceNumber',
        'redemption_url' => 'redemptionUrl',
        'send' => 'send',
        'sender_customer_service_number' => 'senderCustomerServiceNumber',
        'terms' => 'terms',
        'voucher_id' => 'voucherId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_id' => 'setAccountId',
        'confirmation_number' => 'setConfirmationNumber',
        'currency' => 'setCurrency',
        'delivery_type' => 'setDeliveryType',
        'epin' => 'setEpin',
        'expires_at' => 'setExpiresAt',
        'instructions' => 'setInstructions',
        'notes' => 'setNotes',
        'recipient_customer_service_number' => 'setRecipientCustomerServiceNumber',
        'redemption_url' => 'setRedemptionUrl',
        'send' => 'setSend',
        'sender_customer_service_number' => 'setSenderCustomerServiceNumber',
        'terms' => 'setTerms',
        'voucher_id' => 'setVoucherId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_id' => 'getAccountId',
        'confirmation_number' => 'getConfirmationNumber',
        'currency' => 'getCurrency',
        'delivery_type' => 'getDeliveryType',
        'epin' => 'getEpin',
        'expires_at' => 'getExpiresAt',
        'instructions' => 'getInstructions',
        'notes' => 'getNotes',
        'recipient_customer_service_number' => 'getRecipientCustomerServiceNumber',
        'redemption_url' => 'getRedemptionUrl',
        'send' => 'getSend',
        'sender_customer_service_number' => 'getSenderCustomerServiceNumber',
        'terms' => 'getTerms',
        'voucher_id' => 'getVoucherId'
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
        $this->setIfExists('account_id', $data ?? [], null);
        $this->setIfExists('confirmation_number', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('delivery_type', $data ?? [], null);
        $this->setIfExists('epin', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('instructions', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
        $this->setIfExists('recipient_customer_service_number', $data ?? [], null);
        $this->setIfExists('redemption_url', $data ?? [], null);
        $this->setIfExists('send', $data ?? [], null);
        $this->setIfExists('sender_customer_service_number', $data ?? [], null);
        $this->setIfExists('terms', $data ?? [], null);
        $this->setIfExists('voucher_id', $data ?? [], null);
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

        if ($this->container['account_id'] === null) {
            $invalidProperties[] = "'account_id' can't be null";
        }
        if ($this->container['confirmation_number'] === null) {
            $invalidProperties[] = "'confirmation_number' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['delivery_type'] === null) {
            $invalidProperties[] = "'delivery_type' can't be null";
        }
        if ($this->container['epin'] === null) {
            $invalidProperties[] = "'epin' can't be null";
        }
        if ($this->container['expires_at'] === null) {
            $invalidProperties[] = "'expires_at' can't be null";
        }
        if ($this->container['instructions'] === null) {
            $invalidProperties[] = "'instructions' can't be null";
        }
        if ($this->container['notes'] === null) {
            $invalidProperties[] = "'notes' can't be null";
        }
        if ($this->container['recipient_customer_service_number'] === null) {
            $invalidProperties[] = "'recipient_customer_service_number' can't be null";
        }
        if ($this->container['redemption_url'] === null) {
            $invalidProperties[] = "'redemption_url' can't be null";
        }
        if ($this->container['send'] === null) {
            $invalidProperties[] = "'send' can't be null";
        }
        if ($this->container['sender_customer_service_number'] === null) {
            $invalidProperties[] = "'sender_customer_service_number' can't be null";
        }
        if ($this->container['terms'] === null) {
            $invalidProperties[] = "'terms' can't be null";
        }
        if ($this->container['voucher_id'] === null) {
            $invalidProperties[] = "'voucher_id' can't be null";
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
     * Gets account_id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param string $account_id account_id
     *
     * @return self
     */
    public function setAccountId($account_id)
    {
        if (is_null($account_id)) {
            throw new \InvalidArgumentException('non-nullable account_id cannot be null');
        }
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets confirmation_number
     *
     * @return string
     */
    public function getConfirmationNumber()
    {
        return $this->container['confirmation_number'];
    }

    /**
     * Sets confirmation_number
     *
     * @param string $confirmation_number confirmation_number
     *
     * @return self
     */
    public function setConfirmationNumber($confirmation_number)
    {
        if (is_null($confirmation_number)) {
            throw new \InvalidArgumentException('non-nullable confirmation_number cannot be null');
        }
        $this->container['confirmation_number'] = $confirmation_number;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency The 3-letter ISO currency code for the send
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
     * Gets delivery_type
     *
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->container['delivery_type'];
    }

    /**
     * Sets delivery_type
     *
     * @param string $delivery_type delivery_type
     *
     * @return self
     */
    public function setDeliveryType($delivery_type)
    {
        if (is_null($delivery_type)) {
            throw new \InvalidArgumentException('non-nullable delivery_type cannot be null');
        }
        $this->container['delivery_type'] = $delivery_type;

        return $this;
    }

    /**
     * Gets epin
     *
     * @return string
     */
    public function getEpin()
    {
        return $this->container['epin'];
    }

    /**
     * Sets epin
     *
     * @param string $epin epin
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
     * @return string
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param string $expires_at expires_at
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
     * @return string
     */
    public function getInstructions()
    {
        return $this->container['instructions'];
    }

    /**
     * Sets instructions
     *
     * @param string $instructions instructions
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
     * @return string
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     *
     * @param string $notes Additional message information about the voucher
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
     * @return string
     */
    public function getRecipientCustomerServiceNumber()
    {
        return $this->container['recipient_customer_service_number'];
    }

    /**
     * Sets recipient_customer_service_number
     *
     * @param string $recipient_customer_service_number recipient_customer_service_number
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
     * Gets redemption_url
     *
     * @return string
     */
    public function getRedemptionUrl()
    {
        return $this->container['redemption_url'];
    }

    /**
     * Sets redemption_url
     *
     * @param string $redemption_url redemption_url
     *
     * @return self
     */
    public function setRedemptionUrl($redemption_url)
    {
        if (is_null($redemption_url)) {
            throw new \InvalidArgumentException('non-nullable redemption_url cannot be null');
        }
        $this->container['redemption_url'] = $redemption_url;

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
     * @param int $send The value delivered by the voucher
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
     * @return string
     */
    public function getSenderCustomerServiceNumber()
    {
        return $this->container['sender_customer_service_number'];
    }

    /**
     * Sets sender_customer_service_number
     *
     * @param string $sender_customer_service_number sender_customer_service_number
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
     * @return string
     */
    public function getTerms()
    {
        return $this->container['terms'];
    }

    /**
     * Sets terms
     *
     * @param string $terms terms
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
     * Gets voucher_id
     *
     * @return string
     */
    public function getVoucherId()
    {
        return $this->container['voucher_id'];
    }

    /**
     * Sets voucher_id
     *
     * @param string $voucher_id voucher_id
     *
     * @return self
     */
    public function setVoucherId($voucher_id)
    {
        if (is_null($voucher_id)) {
            throw new \InvalidArgumentException('non-nullable voucher_id cannot be null');
        }
        $this->container['voucher_id'] = $voucher_id;

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


