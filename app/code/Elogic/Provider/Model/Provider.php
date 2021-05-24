<?php

namespace Elogic\Provider\Model;

use Elogic\Provider\Api\Data\ProviderInterface;

/**
 * Class Provider
 * @package Elogic\Provider\Model
 */
class Provider extends \Magento\Framework\Model\AbstractModel implements ProviderInterface
{

    /**
     * @return array|int|mixed|null
     */
    public function getId()
    {
        return $this->getData(self::FIELD_NAME_ID);
    }


    /**
     * @return array|mixed|string|null
     */
    public function getName()
    {
        return $this->getData(self::FIELD_NAME_NAME);
    }


    /**
     * @param string $name
     * @return array|ProviderInterface|Provider|mixed|null
     */
    public function setName($name)
    {
        return $this->getData($name, self::FIELD_NAME_NAME);
    }


    /**
     * @return array|mixed|null
     */
    public function getDescription()
    {
        return $this->getData(self::FIELD_NAME_DESCRIPTION);
    }


    /**
     * @param $description
     * @return array|ProviderInterface|Provider|mixed|null
     */
    public function setDescription($description)
    {
        return $this->getData($description, self::FIELD_NAME_DESCRIPTION);
    }


    /**
     * @return array|mixed|string|null
     */
    public function getDateAdded()
    {
        return $this->getData(self::FIELD_NAME_DATE_ADDED);
    }


    /**
     * @return array|mixed|string|null
     */
    public function getLogo()
    {
        return $this->getData(self::FIELD_NAME_LOGO);
    }


    /**
     * @param $logo
     * @return array|ProviderInterface|Provider|mixed|null
     */
    public function setLogo($logo)
    {
        return $this->getData($logo, self::FIELD_NAME_LOGO);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Elogic\Provider\Model\ResourceModel\Provider::class);
    }
}
