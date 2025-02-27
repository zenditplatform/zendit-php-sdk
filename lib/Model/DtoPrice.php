<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoPrice Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoPrice implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.Price';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'currency' => 'string',
        'fixed' => 'int',
        'fx' => 'float',
        'margin' => 'float',
        'max' => 'int',
        'min' => 'int',
        'suggested_fixed' => 'int',
        'suggested_fx' => 'float'
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
        'fixed' => null,
        'fx' => null,
        'margin' => null,
        'max' => null,
        'min' => null,
        'suggested_fixed' => null,
        'suggested_fx' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'currency' => false,
        'fixed' => false,
        'fx' => false,
        'margin' => false,
        'max' => false,
        'min' => false,
        'suggested_fixed' => false,
        'suggested_fx' => false
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
        'currency' => 'currency',
        'fixed' => 'fixed',
        'fx' => 'fx',
        'margin' => 'margin',
        'max' => 'max',
        'min' => 'min',
        'suggested_fixed' => 'suggestedFixed',
        'suggested_fx' => 'suggestedFx'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'currency' => 'setCurrency',
        'fixed' => 'setFixed',
        'fx' => 'setFx',
        'margin' => 'setMargin',
        'max' => 'setMax',
        'min' => 'setMin',
        'suggested_fixed' => 'setSuggestedFixed',
        'suggested_fx' => 'setSuggestedFx'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'currency' => 'getCurrency',
        'fixed' => 'getFixed',
        'fx' => 'getFx',
        'margin' => 'getMargin',
        'max' => 'getMax',
        'min' => 'getMin',
        'suggested_fixed' => 'getSuggestedFixed',
        'suggested_fx' => 'getSuggestedFx'
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
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('fixed', $data ?? [], null);
        $this->setIfExists('fx', $data ?? [], null);
        $this->setIfExists('margin', $data ?? [], null);
        $this->setIfExists('max', $data ?? [], null);
        $this->setIfExists('min', $data ?? [], null);
        $this->setIfExists('suggested_fixed', $data ?? [], null);
        $this->setIfExists('suggested_fx', $data ?? [], null);
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

        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
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
     * @param string $currency currency
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
     * Gets fixed
     *
     * @return int|null
     */
    public function getFixed()
    {
        return $this->container['fixed'];
    }

    /**
     * Sets fixed
     *
     * @param int|null $fixed fixed
     *
     * @return self
     */
    public function setFixed($fixed)
    {
        if (is_null($fixed)) {
            throw new \InvalidArgumentException('non-nullable fixed cannot be null');
        }
        $this->container['fixed'] = $fixed;

        return $this;
    }

    /**
     * Gets fx
     *
     * @return float|null
     */
    public function getFx()
    {
        return $this->container['fx'];
    }

    /**
     * Sets fx
     *
     * @param float|null $fx fx
     *
     * @return self
     */
    public function setFx($fx)
    {
        if (is_null($fx)) {
            throw new \InvalidArgumentException('non-nullable fx cannot be null');
        }
        $this->container['fx'] = $fx;

        return $this;
    }

    /**
     * Gets margin
     *
     * @return float|null
     */
    public function getMargin()
    {
        return $this->container['margin'];
    }

    /**
     * Sets margin
     *
     * @param float|null $margin margin
     *
     * @return self
     */
    public function setMargin($margin)
    {
        if (is_null($margin)) {
            throw new \InvalidArgumentException('non-nullable margin cannot be null');
        }
        $this->container['margin'] = $margin;

        return $this;
    }

    /**
     * Gets max
     *
     * @return int|null
     */
    public function getMax()
    {
        return $this->container['max'];
    }

    /**
     * Sets max
     *
     * @param int|null $max max
     *
     * @return self
     */
    public function setMax($max)
    {
        if (is_null($max)) {
            throw new \InvalidArgumentException('non-nullable max cannot be null');
        }
        $this->container['max'] = $max;

        return $this;
    }

    /**
     * Gets min
     *
     * @return int|null
     */
    public function getMin()
    {
        return $this->container['min'];
    }

    /**
     * Sets min
     *
     * @param int|null $min min
     *
     * @return self
     */
    public function setMin($min)
    {
        if (is_null($min)) {
            throw new \InvalidArgumentException('non-nullable min cannot be null');
        }
        $this->container['min'] = $min;

        return $this;
    }

    /**
     * Gets suggested_fixed
     *
     * @return int|null
     */
    public function getSuggestedFixed()
    {
        return $this->container['suggested_fixed'];
    }

    /**
     * Sets suggested_fixed
     *
     * @param int|null $suggested_fixed suggested_fixed
     *
     * @return self
     */
    public function setSuggestedFixed($suggested_fixed)
    {
        if (is_null($suggested_fixed)) {
            throw new \InvalidArgumentException('non-nullable suggested_fixed cannot be null');
        }
        $this->container['suggested_fixed'] = $suggested_fixed;

        return $this;
    }

    /**
     * Gets suggested_fx
     *
     * @return float|null
     */
    public function getSuggestedFx()
    {
        return $this->container['suggested_fx'];
    }

    /**
     * Sets suggested_fx
     *
     * @param float|null $suggested_fx suggested_fx
     *
     * @return self
     */
    public function setSuggestedFx($suggested_fx)
    {
        if (is_null($suggested_fx)) {
            throw new \InvalidArgumentException('non-nullable suggested_fx cannot be null');
        }
        $this->container['suggested_fx'] = $suggested_fx;

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


