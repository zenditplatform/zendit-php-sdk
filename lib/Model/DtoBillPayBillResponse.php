<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoBillPayBillResponse Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoBillPayBillResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.BillPayBillResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cost' => 'int',
        'cost_currency' => 'string',
        'cost_currency_divisor' => 'int',
        'cost_fee' => 'int',
        'cost_fee_pct' => 'int',
        'cost_fee_total' => 'int',
        'cost_total' => 'int',
        'created_at' => 'string',
        'price' => 'int',
        'price_currency' => 'string',
        'price_currency_divisor' => 'int',
        'price_fx' => 'float',
        'price_type' => '\Zendit\Model\DtoPriceType',
        'send' => 'int',
        'send_currency' => 'string',
        'send_currency_divisor' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cost' => null,
        'cost_currency' => null,
        'cost_currency_divisor' => null,
        'cost_fee' => null,
        'cost_fee_pct' => null,
        'cost_fee_total' => null,
        'cost_total' => null,
        'created_at' => null,
        'price' => null,
        'price_currency' => null,
        'price_currency_divisor' => null,
        'price_fx' => null,
        'price_type' => null,
        'send' => null,
        'send_currency' => null,
        'send_currency_divisor' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'cost' => false,
        'cost_currency' => false,
        'cost_currency_divisor' => false,
        'cost_fee' => false,
        'cost_fee_pct' => false,
        'cost_fee_total' => false,
        'cost_total' => false,
        'created_at' => false,
        'price' => false,
        'price_currency' => false,
        'price_currency_divisor' => false,
        'price_fx' => false,
        'price_type' => false,
        'send' => false,
        'send_currency' => false,
        'send_currency_divisor' => false
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
        'cost' => 'cost',
        'cost_currency' => 'costCurrency',
        'cost_currency_divisor' => 'costCurrencyDivisor',
        'cost_fee' => 'costFee',
        'cost_fee_pct' => 'costFeePct',
        'cost_fee_total' => 'costFeeTotal',
        'cost_total' => 'costTotal',
        'created_at' => 'createdAt',
        'price' => 'price',
        'price_currency' => 'priceCurrency',
        'price_currency_divisor' => 'priceCurrencyDivisor',
        'price_fx' => 'priceFx',
        'price_type' => 'priceType',
        'send' => 'send',
        'send_currency' => 'sendCurrency',
        'send_currency_divisor' => 'sendCurrencyDivisor'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cost' => 'setCost',
        'cost_currency' => 'setCostCurrency',
        'cost_currency_divisor' => 'setCostCurrencyDivisor',
        'cost_fee' => 'setCostFee',
        'cost_fee_pct' => 'setCostFeePct',
        'cost_fee_total' => 'setCostFeeTotal',
        'cost_total' => 'setCostTotal',
        'created_at' => 'setCreatedAt',
        'price' => 'setPrice',
        'price_currency' => 'setPriceCurrency',
        'price_currency_divisor' => 'setPriceCurrencyDivisor',
        'price_fx' => 'setPriceFx',
        'price_type' => 'setPriceType',
        'send' => 'setSend',
        'send_currency' => 'setSendCurrency',
        'send_currency_divisor' => 'setSendCurrencyDivisor'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cost' => 'getCost',
        'cost_currency' => 'getCostCurrency',
        'cost_currency_divisor' => 'getCostCurrencyDivisor',
        'cost_fee' => 'getCostFee',
        'cost_fee_pct' => 'getCostFeePct',
        'cost_fee_total' => 'getCostFeeTotal',
        'cost_total' => 'getCostTotal',
        'created_at' => 'getCreatedAt',
        'price' => 'getPrice',
        'price_currency' => 'getPriceCurrency',
        'price_currency_divisor' => 'getPriceCurrencyDivisor',
        'price_fx' => 'getPriceFx',
        'price_type' => 'getPriceType',
        'send' => 'getSend',
        'send_currency' => 'getSendCurrency',
        'send_currency_divisor' => 'getSendCurrencyDivisor'
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
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('cost_currency', $data ?? [], null);
        $this->setIfExists('cost_currency_divisor', $data ?? [], null);
        $this->setIfExists('cost_fee', $data ?? [], null);
        $this->setIfExists('cost_fee_pct', $data ?? [], null);
        $this->setIfExists('cost_fee_total', $data ?? [], null);
        $this->setIfExists('cost_total', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('price_currency', $data ?? [], null);
        $this->setIfExists('price_currency_divisor', $data ?? [], null);
        $this->setIfExists('price_fx', $data ?? [], null);
        $this->setIfExists('price_type', $data ?? [], null);
        $this->setIfExists('send', $data ?? [], null);
        $this->setIfExists('send_currency', $data ?? [], null);
        $this->setIfExists('send_currency_divisor', $data ?? [], null);
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
     * Gets cost_currency_divisor
     *
     * @return int|null
     */
    public function getCostCurrencyDivisor()
    {
        return $this->container['cost_currency_divisor'];
    }

    /**
     * Sets cost_currency_divisor
     *
     * @param int|null $cost_currency_divisor cost_currency_divisor
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
     * @return int|null
     */
    public function getCostFee()
    {
        return $this->container['cost_fee'];
    }

    /**
     * Sets cost_fee
     *
     * @param int|null $cost_fee cost_fee
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
     * Gets cost_fee_pct
     *
     * @return int|null
     */
    public function getCostFeePct()
    {
        return $this->container['cost_fee_pct'];
    }

    /**
     * Sets cost_fee_pct
     *
     * @param int|null $cost_fee_pct cost_fee_pct
     *
     * @return self
     */
    public function setCostFeePct($cost_fee_pct)
    {
        if (is_null($cost_fee_pct)) {
            throw new \InvalidArgumentException('non-nullable cost_fee_pct cannot be null');
        }
        $this->container['cost_fee_pct'] = $cost_fee_pct;

        return $this;
    }

    /**
     * Gets cost_fee_total
     *
     * @return int|null
     */
    public function getCostFeeTotal()
    {
        return $this->container['cost_fee_total'];
    }

    /**
     * Sets cost_fee_total
     *
     * @param int|null $cost_fee_total cost_fee_total
     *
     * @return self
     */
    public function setCostFeeTotal($cost_fee_total)
    {
        if (is_null($cost_fee_total)) {
            throw new \InvalidArgumentException('non-nullable cost_fee_total cannot be null');
        }
        $this->container['cost_fee_total'] = $cost_fee_total;

        return $this;
    }

    /**
     * Gets cost_total
     *
     * @return int|null
     */
    public function getCostTotal()
    {
        return $this->container['cost_total'];
    }

    /**
     * Sets cost_total
     *
     * @param int|null $cost_total cost_total
     *
     * @return self
     */
    public function setCostTotal($cost_total)
    {
        if (is_null($cost_total)) {
            throw new \InvalidArgumentException('non-nullable cost_total cannot be null');
        }
        $this->container['cost_total'] = $cost_total;

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
     * Gets price_currency_divisor
     *
     * @return int|null
     */
    public function getPriceCurrencyDivisor()
    {
        return $this->container['price_currency_divisor'];
    }

    /**
     * Sets price_currency_divisor
     *
     * @param int|null $price_currency_divisor price_currency_divisor
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
     * Gets price_fx
     *
     * @return float|null
     */
    public function getPriceFx()
    {
        return $this->container['price_fx'];
    }

    /**
     * Sets price_fx
     *
     * @param float|null $price_fx price_fx
     *
     * @return self
     */
    public function setPriceFx($price_fx)
    {
        if (is_null($price_fx)) {
            throw new \InvalidArgumentException('non-nullable price_fx cannot be null');
        }
        $this->container['price_fx'] = $price_fx;

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
     * Gets send_currency_divisor
     *
     * @return int|null
     */
    public function getSendCurrencyDivisor()
    {
        return $this->container['send_currency_divisor'];
    }

    /**
     * Sets send_currency_divisor
     *
     * @param int|null $send_currency_divisor send_currency_divisor
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


