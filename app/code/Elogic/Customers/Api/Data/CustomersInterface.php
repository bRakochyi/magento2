<?php
/**
 * Elogic Customers Interface
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */

namespace Elogic\Customers\Api\Data;

/**
 * Interface CustomersInterface
 *
 * @package Elogic\Customers\Api\Data
 */
interface CustomersInterface
{
    /**
    * Constant for column's name "id" in table elogic_customers
    */
    const ID = 'customer_id';

    /**
    * Constant for column's name "first_name" in table elogic_customers
    */
    const FIRST_NAME = 'first_name';

    /**
    * Constant for column's name "last_name" in table elogic_customers
    */
    const LAST_NAME = 'last_name';

    /**
    * Constant for column's name "email" in table elogic_customers
    */
    const EMAIL = 'email';

    /**
    * Constant for column's name "phone" in table elogic_customers
    */
    const PHONE = 'phone';

    /**
    * Constant for column's name "country" in table elogic_customers
    */
    const COUNTRY = 'country';

    /**
    * Constant for column's name "city" in table elogic_customers
    */
    const CITY = 'city';

    /**
    * Constant for column's name "create_at" in table elogic_customers
    */
    const CREATE_AT = 'create_at';

    /**
    * Constant for column's name "update_at" in table elogic_customers
    */
    const UPDATE_AT = 'update_at';

    /**
    * Constant for column's name "status" in table elogic_customers
    */
    const STATUS = 'status';

    /**
     * Constant for column's name "photo" in table elogic_customers
     */
    const PHOTO = 'photo';

    /**
     * Return customers id
     *
     * @return int
     */
    public function getCustomerId();

    /**
     * @param int $id
     * @return $this
     */
    public function setCustomerId(int $id);

    /**
     * Return customers first name
     *
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $first_name
     * @return $this
     */
    public function setFirstName(string $first_name);

    /**
     * Return customers last name
     *
     * @return string
     */
    public function getLastName();

    /**
     * @param string $last_name
     * @return $this
     */
    public function setLastName(string $last_name);

    /**
     * Return customers email
     *
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email);

    /**
     * Return customers phone
     *
     * @return string
     */
    public function getPhone();

    /**
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone(string $phone);

    /**
     * Return customers country
     *
     * @return string
     */
    public function getCountry();

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country);

    /**
     * Return customers city
     *
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     * @return $this
     */
    public function setCity(string $city);

    /**
     * Return customers create at
     *
     * @return int|null
     */
    public function getCreateAt();

    /**
     * @param int $create_at
     * @return $this
     */
    public function setCreateAt(int $create_at);

    /**
     * Return customers update at
     *
     * @return int|null
     */
    public function getUpdateAt();

    /**
     * @param int $update_at
     * @return $this
     */
    public function setUpdateAt(int $update_at);

    /**
     * Return customers status
     *
     * @return int|null
     */
    public function getIsActive();

    /**
     * @param int $isActive
     * @return $this
     */
    public function setIsActive(int $isActive);

    /**
     * Return customers photo
     *
     * @return mixed
     */
    public function getPhoto();

    /**
     * @param $photo
     * @return mixed
     */
    public function setPhoto($photo);
}
