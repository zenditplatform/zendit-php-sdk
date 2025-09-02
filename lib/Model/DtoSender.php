<?php
namespace Zendit\Model;

use \ArrayAccess;
use \Zendit\ObjectSerializer;

/**
 * DtoSender Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 * @implements \ArrayAccess<string, mixed>
 */
class DtoSender implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.Sender';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'date_of_birth' => 'string',
        'email' => 'string',
        'employer_address' => 'string',
        'employer_name' => 'string',
        'first_name' => 'string',
        'gender' => 'string',
        'home_address' => '\Zendit\Model\DtoHomeAddress',
        'last_name' => 'string',
        'middle_name' => 'string',
        'mothers_maiden_name' => 'string',
        'nationality' => 'string',
        'occupation' => 'string',
        'phone' => 'string',
        'relation_to_recipient' => 'string',
        'source_of_funds' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'date_of_birth' => null,
        'email' => null,
        'employer_address' => null,
        'employer_name' => null,
        'first_name' => null,
        'gender' => null,
        'home_address' => null,
        'last_name' => null,
        'middle_name' => null,
        'mothers_maiden_name' => null,
        'nationality' => null,
        'occupation' => null,
        'phone' => null,
        'relation_to_recipient' => null,
        'source_of_funds' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'date_of_birth' => false,
        'email' => false,
        'employer_address' => false,
        'employer_name' => false,
        'first_name' => false,
        'gender' => false,
        'home_address' => false,
        'last_name' => false,
        'middle_name' => false,
        'mothers_maiden_name' => false,
        'nationality' => false,
        'occupation' => false,
        'phone' => false,
        'relation_to_recipient' => false,
        'source_of_funds' => false
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
        'date_of_birth' => 'dateOfBirth',
        'email' => 'email',
        'employer_address' => 'employerAddress',
        'employer_name' => 'employerName',
        'first_name' => 'firstName',
        'gender' => 'gender',
        'home_address' => 'homeAddress',
        'last_name' => 'lastName',
        'middle_name' => 'middleName',
        'mothers_maiden_name' => 'mothersMaidenName',
        'nationality' => 'nationality',
        'occupation' => 'occupation',
        'phone' => 'phone',
        'relation_to_recipient' => 'relationToRecipient',
        'source_of_funds' => 'sourceOfFunds'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'date_of_birth' => 'setDateOfBirth',
        'email' => 'setEmail',
        'employer_address' => 'setEmployerAddress',
        'employer_name' => 'setEmployerName',
        'first_name' => 'setFirstName',
        'gender' => 'setGender',
        'home_address' => 'setHomeAddress',
        'last_name' => 'setLastName',
        'middle_name' => 'setMiddleName',
        'mothers_maiden_name' => 'setMothersMaidenName',
        'nationality' => 'setNationality',
        'occupation' => 'setOccupation',
        'phone' => 'setPhone',
        'relation_to_recipient' => 'setRelationToRecipient',
        'source_of_funds' => 'setSourceOfFunds'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'date_of_birth' => 'getDateOfBirth',
        'email' => 'getEmail',
        'employer_address' => 'getEmployerAddress',
        'employer_name' => 'getEmployerName',
        'first_name' => 'getFirstName',
        'gender' => 'getGender',
        'home_address' => 'getHomeAddress',
        'last_name' => 'getLastName',
        'middle_name' => 'getMiddleName',
        'mothers_maiden_name' => 'getMothersMaidenName',
        'nationality' => 'getNationality',
        'occupation' => 'getOccupation',
        'phone' => 'getPhone',
        'relation_to_recipient' => 'getRelationToRecipient',
        'source_of_funds' => 'getSourceOfFunds'
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
        $this->setIfExists('date_of_birth', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('employer_address', $data ?? [], null);
        $this->setIfExists('employer_name', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('gender', $data ?? [], null);
        $this->setIfExists('home_address', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('middle_name', $data ?? [], null);
        $this->setIfExists('mothers_maiden_name', $data ?? [], null);
        $this->setIfExists('nationality', $data ?? [], null);
        $this->setIfExists('occupation', $data ?? [], null);
        $this->setIfExists('phone', $data ?? [], null);
        $this->setIfExists('relation_to_recipient', $data ?? [], null);
        $this->setIfExists('source_of_funds', $data ?? [], null);
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

        if ($this->container['date_of_birth'] === null) {
            $invalidProperties[] = "'date_of_birth' can't be null";
        }
        if ($this->container['first_name'] === null) {
            $invalidProperties[] = "'first_name' can't be null";
        }
        if ($this->container['home_address'] === null) {
            $invalidProperties[] = "'home_address' can't be null";
        }
        if ($this->container['last_name'] === null) {
            $invalidProperties[] = "'last_name' can't be null";
        }
        if ($this->container['phone'] === null) {
            $invalidProperties[] = "'phone' can't be null";
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
     * Gets date_of_birth
     *
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->container['date_of_birth'];
    }

    /**
     * Sets date_of_birth
     *
     * @param string $date_of_birth date_of_birth
     *
     * @return self
     */
    public function setDateOfBirth($date_of_birth)
    {
        if (is_null($date_of_birth)) {
            throw new \InvalidArgumentException('non-nullable date_of_birth cannot be null');
        }
        $this->container['date_of_birth'] = $date_of_birth;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email email
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets employer_address
     *
     * @return string|null
     */
    public function getEmployerAddress()
    {
        return $this->container['employer_address'];
    }

    /**
     * Sets employer_address
     *
     * @param string|null $employer_address employer_address
     *
     * @return self
     */
    public function setEmployerAddress($employer_address)
    {
        if (is_null($employer_address)) {
            throw new \InvalidArgumentException('non-nullable employer_address cannot be null');
        }
        $this->container['employer_address'] = $employer_address;

        return $this;
    }

    /**
     * Gets employer_name
     *
     * @return string|null
     */
    public function getEmployerName()
    {
        return $this->container['employer_name'];
    }

    /**
     * Sets employer_name
     *
     * @param string|null $employer_name employer_name
     *
     * @return self
     */
    public function setEmployerName($employer_name)
    {
        if (is_null($employer_name)) {
            throw new \InvalidArgumentException('non-nullable employer_name cannot be null');
        }
        $this->container['employer_name'] = $employer_name;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string $first_name first_name
     *
     * @return self
     */
    public function setFirstName($first_name)
    {
        if (is_null($first_name)) {
            throw new \InvalidArgumentException('non-nullable first_name cannot be null');
        }
        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets gender
     *
     * @return string|null
     */
    public function getGender()
    {
        return $this->container['gender'];
    }

    /**
     * Sets gender
     *
     * @param string|null $gender gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        if (is_null($gender)) {
            throw new \InvalidArgumentException('non-nullable gender cannot be null');
        }
        $this->container['gender'] = $gender;

        return $this;
    }

    /**
     * Gets home_address
     *
     * @return \Zendit\Model\DtoHomeAddress
     */
    public function getHomeAddress()
    {
        return $this->container['home_address'];
    }

    /**
     * Sets home_address
     *
     * @param \Zendit\Model\DtoHomeAddress $home_address home_address
     *
     * @return self
     */
    public function setHomeAddress($home_address)
    {
        if (is_null($home_address)) {
            throw new \InvalidArgumentException('non-nullable home_address cannot be null');
        }
        $this->container['home_address'] = $home_address;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string $last_name last_name
     *
     * @return self
     */
    public function setLastName($last_name)
    {
        if (is_null($last_name)) {
            throw new \InvalidArgumentException('non-nullable last_name cannot be null');
        }
        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets middle_name
     *
     * @return string|null
     */
    public function getMiddleName()
    {
        return $this->container['middle_name'];
    }

    /**
     * Sets middle_name
     *
     * @param string|null $middle_name middle_name
     *
     * @return self
     */
    public function setMiddleName($middle_name)
    {
        if (is_null($middle_name)) {
            throw new \InvalidArgumentException('non-nullable middle_name cannot be null');
        }
        $this->container['middle_name'] = $middle_name;

        return $this;
    }

    /**
     * Gets mothers_maiden_name
     *
     * @return string|null
     */
    public function getMothersMaidenName()
    {
        return $this->container['mothers_maiden_name'];
    }

    /**
     * Sets mothers_maiden_name
     *
     * @param string|null $mothers_maiden_name mothers_maiden_name
     *
     * @return self
     */
    public function setMothersMaidenName($mothers_maiden_name)
    {
        if (is_null($mothers_maiden_name)) {
            throw new \InvalidArgumentException('non-nullable mothers_maiden_name cannot be null');
        }
        $this->container['mothers_maiden_name'] = $mothers_maiden_name;

        return $this;
    }

    /**
     * Gets nationality
     *
     * @return string|null
     */
    public function getNationality()
    {
        return $this->container['nationality'];
    }

    /**
     * Sets nationality
     *
     * @param string|null $nationality nationality
     *
     * @return self
     */
    public function setNationality($nationality)
    {
        if (is_null($nationality)) {
            throw new \InvalidArgumentException('non-nullable nationality cannot be null');
        }
        $this->container['nationality'] = $nationality;

        return $this;
    }

    /**
     * Gets occupation
     *
     * @return string|null
     */
    public function getOccupation()
    {
        return $this->container['occupation'];
    }

    /**
     * Sets occupation
     *
     * @param string|null $occupation occupation
     *
     * @return self
     */
    public function setOccupation($occupation)
    {
        if (is_null($occupation)) {
            throw new \InvalidArgumentException('non-nullable occupation cannot be null');
        }
        $this->container['occupation'] = $occupation;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string $phone phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        if (is_null($phone)) {
            throw new \InvalidArgumentException('non-nullable phone cannot be null');
        }
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets relation_to_recipient
     *
     * @return string|null
     */
    public function getRelationToRecipient()
    {
        return $this->container['relation_to_recipient'];
    }

    /**
     * Sets relation_to_recipient
     *
     * @param string|null $relation_to_recipient relation_to_recipient
     *
     * @return self
     */
    public function setRelationToRecipient($relation_to_recipient)
    {
        if (is_null($relation_to_recipient)) {
            throw new \InvalidArgumentException('non-nullable relation_to_recipient cannot be null');
        }
        $this->container['relation_to_recipient'] = $relation_to_recipient;

        return $this;
    }

    /**
     * Gets source_of_funds
     *
     * @return string|null
     */
    public function getSourceOfFunds()
    {
        return $this->container['source_of_funds'];
    }

    /**
     * Sets source_of_funds
     *
     * @param string|null $source_of_funds source_of_funds
     *
     * @return self
     */
    public function setSourceOfFunds($source_of_funds)
    {
        if (is_null($source_of_funds)) {
            throw new \InvalidArgumentException('non-nullable source_of_funds cannot be null');
        }
        $this->container['source_of_funds'] = $source_of_funds;

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


