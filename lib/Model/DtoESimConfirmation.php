<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoESimConfirmation Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoESimConfirmation implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.ESimConfirmation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'activation_code' => 'string',
        'external_reference_id' => 'string',
        'iccid' => 'string',
        'redemption_instructions' => 'string',
        'smdp_address' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'activation_code' => null,
        'external_reference_id' => null,
        'iccid' => null,
        'redemption_instructions' => null,
        'smdp_address' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'activation_code' => false,
        'external_reference_id' => false,
        'iccid' => false,
        'redemption_instructions' => false,
        'smdp_address' => false
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
        'activation_code' => 'activationCode',
        'external_reference_id' => 'externalReferenceId',
        'iccid' => 'iccid',
        'redemption_instructions' => 'redemptionInstructions',
        'smdp_address' => 'smdpAddress'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'activation_code' => 'setActivationCode',
        'external_reference_id' => 'setExternalReferenceId',
        'iccid' => 'setIccid',
        'redemption_instructions' => 'setRedemptionInstructions',
        'smdp_address' => 'setSmdpAddress'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'activation_code' => 'getActivationCode',
        'external_reference_id' => 'getExternalReferenceId',
        'iccid' => 'getIccid',
        'redemption_instructions' => 'getRedemptionInstructions',
        'smdp_address' => 'getSmdpAddress'
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
        $this->setIfExists('activation_code', $data ?? [], null);
        $this->setIfExists('external_reference_id', $data ?? [], null);
        $this->setIfExists('iccid', $data ?? [], null);
        $this->setIfExists('redemption_instructions', $data ?? [], null);
        $this->setIfExists('smdp_address', $data ?? [], null);
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

        if ($this->container['activation_code'] === null) {
            $invalidProperties[] = "'activation_code' can't be null";
        }
        if ($this->container['external_reference_id'] === null) {
            $invalidProperties[] = "'external_reference_id' can't be null";
        }
        if ($this->container['iccid'] === null) {
            $invalidProperties[] = "'iccid' can't be null";
        }
        if ($this->container['redemption_instructions'] === null) {
            $invalidProperties[] = "'redemption_instructions' can't be null";
        }
        if ($this->container['smdp_address'] === null) {
            $invalidProperties[] = "'smdp_address' can't be null";
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
     * Gets activation_code
     *
     * @return string
     */
    public function getActivationCode()
    {
        return $this->container['activation_code'];
    }

    /**
     * Sets activation_code
     *
     * @param string $activation_code activation_code
     *
     * @return self
     */
    public function setActivationCode($activation_code)
    {
        if (is_null($activation_code)) {
            throw new \InvalidArgumentException('non-nullable activation_code cannot be null');
        }
        $this->container['activation_code'] = $activation_code;

        return $this;
    }

    /**
     * Gets external_reference_id
     *
     * @return string
     */
    public function getExternalReferenceId()
    {
        return $this->container['external_reference_id'];
    }

    /**
     * Sets external_reference_id
     *
     * @param string $external_reference_id external_reference_id
     *
     * @return self
     */
    public function setExternalReferenceId($external_reference_id)
    {
        if (is_null($external_reference_id)) {
            throw new \InvalidArgumentException('non-nullable external_reference_id cannot be null');
        }
        $this->container['external_reference_id'] = $external_reference_id;

        return $this;
    }

    /**
     * Gets iccid
     *
     * @return string
     */
    public function getIccid()
    {
        return $this->container['iccid'];
    }

    /**
     * Sets iccid
     *
     * @param string $iccid iccid
     *
     * @return self
     */
    public function setIccid($iccid)
    {
        if (is_null($iccid)) {
            throw new \InvalidArgumentException('non-nullable iccid cannot be null');
        }
        $this->container['iccid'] = $iccid;

        return $this;
    }

    /**
     * Gets redemption_instructions
     *
     * @return string
     */
    public function getRedemptionInstructions()
    {
        return $this->container['redemption_instructions'];
    }

    /**
     * Sets redemption_instructions
     *
     * @param string $redemption_instructions redemption_instructions
     *
     * @return self
     */
    public function setRedemptionInstructions($redemption_instructions)
    {
        if (is_null($redemption_instructions)) {
            throw new \InvalidArgumentException('non-nullable redemption_instructions cannot be null');
        }
        $this->container['redemption_instructions'] = $redemption_instructions;

        return $this;
    }

    /**
     * Gets smdp_address
     *
     * @return string
     */
    public function getSmdpAddress()
    {
        return $this->container['smdp_address'];
    }

    /**
     * Sets smdp_address
     *
     * @param string $smdp_address smdp_address
     *
     * @return self
     */
    public function setSmdpAddress($smdp_address)
    {
        if (is_null($smdp_address)) {
            throw new \InvalidArgumentException('non-nullable smdp_address cannot be null');
        }
        $this->container['smdp_address'] = $smdp_address;

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


