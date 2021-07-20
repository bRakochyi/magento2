<?php
/**
 * Elogic Model Customers
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Model;

use Elogic\Customers\Api\Data\CustomersInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Customers
 *
 * @package Elogic\Customers\Model
 */
class Customers extends AbstractModel implements CustomersInterface
{
    /**
     * Get Id
     *
     * @return array|int|mixed|null
     */
    public function getCustomerId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set Id
     *
     * @param int $id
     * @return Customers
     */
    public function setCustomerId(int $id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get First Name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->getData(self::FIRST_NAME);
    }

    /**
     * Set First Name
     *
     * @param string $first_name
     * @return Customers
     */
    public function setFirstName(string $first_name)
    {
        return $this->setData(self::FIRST_NAME, $first_name);
    }

    /**
     * Get Last Name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->getData(self::LAST_NAME);
    }

    /**
     * Set Last Name
     *
     * @param string $last_name
     * @return Customers
     */
    public function setLastName(string $last_name)
    {
        return $this->setData(self::LAST_NAME, $last_name);
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email
     *
     * @param string $email
     * @return Customers
     */
    public function setEmail(string $email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get Phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->getData(self::PHONE);
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Customers
     */
    public function setPhone(string $phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Get Country
     *
     * @return array|int|mixed|null
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * Set Country
     *
     * @param string $country
     * @return Customers
     */
    public function setCountry(string $country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * Get City
     *
     * @return array|int|mixed|null
     */
    public function getCity()
    {
        return $this->getData(self::CITY);
    }

    /**
     * Set City
     *
     * @param string $city
     * @return Customers
     */
    public function setCity(string $city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get Create At
     *
     * @return array|int|mixed|null
     */
    public function getCreateAt()
    {
        return $this->getData(self::CREATE_AT);
    }

    /**
     * Set Create At
     *
     * @param int $create_at
     * @return Customers
     */
    public function setCreateAt(int $create_at)
    {
        return $this->setData(self::CREATE_AT, $create_at);
    }

    /**
     * Get Update At
     *
     * @return array|int|mixed|null
     */
    public function getUpdateAt()
    {
        return $this->getData(self::UPDATE_AT);
    }

    /**
     * Set Update At
     *
     * @param int $update_at
     * @return Customers
     */
    public function setUpdateAt(int $update_at)
    {
        return $this->setData(self::UPDATE_AT, $update_at);
    }

    /**
     * Get Status
     *
     * @return array|int|mixed|null
     */
    public function getIsActive()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set Status
     *
     * @param int $isActive
     * @return Customers
     */
    public function setIsActive(int $isActive)
    {
        return $this->setData(self::STATUS, $isActive);
    }

    /**
     * Get Photo
     *
     * @return array|mixed|null
     */
    public function getPhoto()
    {
        return $this->getData(self::PHOTO);
    }

    /**
     * Set Photo
     *
     * @param $photo
     * @return Customers
     */
    public function setPhoto($photo)
    {
        return $this->setData(self::PHOTO, $photo);
    }

    /**
     * Initialization model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\Customers::class);
    }
}
