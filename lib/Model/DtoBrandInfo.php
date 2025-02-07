<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoBrandInfo Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoBrandInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.BrandInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'brand_big_image' => 'string',
        'brand_color' => 'string',
        'brand_gift_image' => 'string',
        'brand_info_pdf' => 'string',
        'brand_logo' => 'string',
        'brand_logo_extension' => 'string',
        'brand_name' => 'string',
        'description' => 'string',
        'input_masks' => '\Zendit\Model\DtoInputMask[]',
        'redemption_instructions' => '\Zendit\Model\DtoRedemptionInstruction[]',
        'required_fields_labels' => '\Zendit\Model\DtoRequiredFieldLabel[]'
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
        'brand_big_image' => null,
        'brand_color' => null,
        'brand_gift_image' => null,
        'brand_info_pdf' => null,
        'brand_logo' => null,
        'brand_logo_extension' => null,
        'brand_name' => null,
        'description' => null,
        'input_masks' => null,
        'redemption_instructions' => null,
        'required_fields_labels' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'brand' => false,
        'brand_big_image' => false,
        'brand_color' => false,
        'brand_gift_image' => false,
        'brand_info_pdf' => false,
        'brand_logo' => false,
        'brand_logo_extension' => false,
        'brand_name' => false,
        'description' => false,
        'input_masks' => false,
        'redemption_instructions' => false,
        'required_fields_labels' => false
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
        'brand_big_image' => 'brandBigImage',
        'brand_color' => 'brandColor',
        'brand_gift_image' => 'brandGiftImage',
        'brand_info_pdf' => 'brandInfoPdf',
        'brand_logo' => 'brandLogo',
        'brand_logo_extension' => 'brandLogoExtension',
        'brand_name' => 'brandName',
        'description' => 'description',
        'input_masks' => 'inputMasks',
        'redemption_instructions' => 'redemptionInstructions',
        'required_fields_labels' => 'requiredFieldsLabels'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brand' => 'setBrand',
        'brand_big_image' => 'setBrandBigImage',
        'brand_color' => 'setBrandColor',
        'brand_gift_image' => 'setBrandGiftImage',
        'brand_info_pdf' => 'setBrandInfoPdf',
        'brand_logo' => 'setBrandLogo',
        'brand_logo_extension' => 'setBrandLogoExtension',
        'brand_name' => 'setBrandName',
        'description' => 'setDescription',
        'input_masks' => 'setInputMasks',
        'redemption_instructions' => 'setRedemptionInstructions',
        'required_fields_labels' => 'setRequiredFieldsLabels'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brand' => 'getBrand',
        'brand_big_image' => 'getBrandBigImage',
        'brand_color' => 'getBrandColor',
        'brand_gift_image' => 'getBrandGiftImage',
        'brand_info_pdf' => 'getBrandInfoPdf',
        'brand_logo' => 'getBrandLogo',
        'brand_logo_extension' => 'getBrandLogoExtension',
        'brand_name' => 'getBrandName',
        'description' => 'getDescription',
        'input_masks' => 'getInputMasks',
        'redemption_instructions' => 'getRedemptionInstructions',
        'required_fields_labels' => 'getRequiredFieldsLabels'
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
        $this->setIfExists('brand_big_image', $data ?? [], null);
        $this->setIfExists('brand_color', $data ?? [], null);
        $this->setIfExists('brand_gift_image', $data ?? [], null);
        $this->setIfExists('brand_info_pdf', $data ?? [], null);
        $this->setIfExists('brand_logo', $data ?? [], null);
        $this->setIfExists('brand_logo_extension', $data ?? [], null);
        $this->setIfExists('brand_name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('input_masks', $data ?? [], null);
        $this->setIfExists('redemption_instructions', $data ?? [], null);
        $this->setIfExists('required_fields_labels', $data ?? [], null);
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
        if ($this->container['brand_big_image'] === null) {
            $invalidProperties[] = "'brand_big_image' can't be null";
        }
        if ($this->container['brand_color'] === null) {
            $invalidProperties[] = "'brand_color' can't be null";
        }
        if ($this->container['brand_gift_image'] === null) {
            $invalidProperties[] = "'brand_gift_image' can't be null";
        }
        if ($this->container['brand_info_pdf'] === null) {
            $invalidProperties[] = "'brand_info_pdf' can't be null";
        }
        if ($this->container['brand_logo'] === null) {
            $invalidProperties[] = "'brand_logo' can't be null";
        }
        if ($this->container['brand_logo_extension'] === null) {
            $invalidProperties[] = "'brand_logo_extension' can't be null";
        }
        if ($this->container['brand_name'] === null) {
            $invalidProperties[] = "'brand_name' can't be null";
        }
        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['input_masks'] === null) {
            $invalidProperties[] = "'input_masks' can't be null";
        }
        if ($this->container['redemption_instructions'] === null) {
            $invalidProperties[] = "'redemption_instructions' can't be null";
        }
        if ($this->container['required_fields_labels'] === null) {
            $invalidProperties[] = "'required_fields_labels' can't be null";
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
     * Gets brand_big_image
     *
     * @return string
     */
    public function getBrandBigImage()
    {
        return $this->container['brand_big_image'];
    }

    /**
     * Sets brand_big_image
     *
     * @param string $brand_big_image brand_big_image
     *
     * @return self
     */
    public function setBrandBigImage($brand_big_image)
    {
        if (is_null($brand_big_image)) {
            throw new \InvalidArgumentException('non-nullable brand_big_image cannot be null');
        }
        $this->container['brand_big_image'] = $brand_big_image;

        return $this;
    }

    /**
     * Gets brand_color
     *
     * @return string
     */
    public function getBrandColor()
    {
        return $this->container['brand_color'];
    }

    /**
     * Sets brand_color
     *
     * @param string $brand_color brand_color
     *
     * @return self
     */
    public function setBrandColor($brand_color)
    {
        if (is_null($brand_color)) {
            throw new \InvalidArgumentException('non-nullable brand_color cannot be null');
        }
        $this->container['brand_color'] = $brand_color;

        return $this;
    }

    /**
     * Gets brand_gift_image
     *
     * @return string
     */
    public function getBrandGiftImage()
    {
        return $this->container['brand_gift_image'];
    }

    /**
     * Sets brand_gift_image
     *
     * @param string $brand_gift_image brand_gift_image
     *
     * @return self
     */
    public function setBrandGiftImage($brand_gift_image)
    {
        if (is_null($brand_gift_image)) {
            throw new \InvalidArgumentException('non-nullable brand_gift_image cannot be null');
        }
        $this->container['brand_gift_image'] = $brand_gift_image;

        return $this;
    }

    /**
     * Gets brand_info_pdf
     *
     * @return string
     */
    public function getBrandInfoPdf()
    {
        return $this->container['brand_info_pdf'];
    }

    /**
     * Sets brand_info_pdf
     *
     * @param string $brand_info_pdf brand_info_pdf
     *
     * @return self
     */
    public function setBrandInfoPdf($brand_info_pdf)
    {
        if (is_null($brand_info_pdf)) {
            throw new \InvalidArgumentException('non-nullable brand_info_pdf cannot be null');
        }
        $this->container['brand_info_pdf'] = $brand_info_pdf;

        return $this;
    }

    /**
     * Gets brand_logo
     *
     * @return string
     */
    public function getBrandLogo()
    {
        return $this->container['brand_logo'];
    }

    /**
     * Sets brand_logo
     *
     * @param string $brand_logo brand_logo
     *
     * @return self
     */
    public function setBrandLogo($brand_logo)
    {
        if (is_null($brand_logo)) {
            throw new \InvalidArgumentException('non-nullable brand_logo cannot be null');
        }
        $this->container['brand_logo'] = $brand_logo;

        return $this;
    }

    /**
     * Gets brand_logo_extension
     *
     * @return string
     */
    public function getBrandLogoExtension()
    {
        return $this->container['brand_logo_extension'];
    }

    /**
     * Sets brand_logo_extension
     *
     * @param string $brand_logo_extension brand_logo_extension
     *
     * @return self
     */
    public function setBrandLogoExtension($brand_logo_extension)
    {
        if (is_null($brand_logo_extension)) {
            throw new \InvalidArgumentException('non-nullable brand_logo_extension cannot be null');
        }
        $this->container['brand_logo_extension'] = $brand_logo_extension;

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
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets input_masks
     *
     * @return \Zendit\Model\DtoInputMask[]
     */
    public function getInputMasks()
    {
        return $this->container['input_masks'];
    }

    /**
     * Sets input_masks
     *
     * @param \Zendit\Model\DtoInputMask[] $input_masks input_masks
     *
     * @return self
     */
    public function setInputMasks($input_masks)
    {
        if (is_null($input_masks)) {
            throw new \InvalidArgumentException('non-nullable input_masks cannot be null');
        }
        $this->container['input_masks'] = $input_masks;

        return $this;
    }

    /**
     * Gets redemption_instructions
     *
     * @return \Zendit\Model\DtoRedemptionInstruction[]
     */
    public function getRedemptionInstructions()
    {
        return $this->container['redemption_instructions'];
    }

    /**
     * Sets redemption_instructions
     *
     * @param \Zendit\Model\DtoRedemptionInstruction[] $redemption_instructions redemption_instructions
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
     * Gets required_fields_labels
     *
     * @return \Zendit\Model\DtoRequiredFieldLabel[]
     */
    public function getRequiredFieldsLabels()
    {
        return $this->container['required_fields_labels'];
    }

    /**
     * Sets required_fields_labels
     *
     * @param \Zendit\Model\DtoRequiredFieldLabel[] $required_fields_labels required_fields_labels
     *
     * @return self
     */
    public function setRequiredFieldsLabels($required_fields_labels)
    {
        if (is_null($required_fields_labels)) {
            throw new \InvalidArgumentException('non-nullable required_fields_labels cannot be null');
        }
        $this->container['required_fields_labels'] = $required_fields_labels;

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


