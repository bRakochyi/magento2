<?php
/**
 * Copyright © Bohdan Rakochyi, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
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
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    /**
     * @param int $postId
     * @return Provider
     */
    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }

    /**
     * @return array|mixed|string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param string $name
     * @return Provider
     */
    public function setName($name)
    {

        return $this->setData(self::NAME, $name);
    }

    /**
     * @return array|mixed|string|null
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return Provider
     */
    public function setDescription($description)
    {

        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @return array|int|mixed|null
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * @param int $isActive
     * @return Provider
     */
    public function setIsActive($isActive)
    {

        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * @return array|mixed|null
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * @param $image
     * @return Provider
     */
    public function setImage($image)
    {

        return $this->setData(self::IMAGE, $image);
    }

    /**
     * @return array|int|mixed|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param int $createdAt
     * @return Provider
     */
    public function setCreatedAt($createdAt)
    {

        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @return array|int|mixed|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param int $updatedAt
     * @return Provider
     */
    public function setUpdatedAt($updatedAt)
    {

        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @return array|mixed|null
     */
    public function getProviderId()
    {
        return $this->getData('post_id');
    }

    /**
     * @param string $attributeCode
     * @return \Magento\Framework\Api\AttributeInterface|void|null
     */
    public function getCustomAttribute($attributeCode)
    {
        // TODO: Implement getCustomAttribute() method.
    }

    /**
     * @param string $attributeCode
     * @param mixed $attributeValue
     * @return Provider|void
     */
    public function setCustomAttribute($attributeCode, $attributeValue)
    {
        // TODO: Implement setCustomAttribute() method.
    }

    /**
     * @return \Magento\Framework\Api\AttributeInterface[]|void|null
     */
    public function getCustomAttributes()
    {
        // TODO: Implement getCustomAttributes() method.
    }

    /**
     * @param array $attributes
     * @return Provider|void
     */
    public function setCustomAttributes(array $attributes)
    {
        // TODO: Implement setCustomAttributes() method.
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Elogic\Provider\Model\ResourceModel\Provider::class);
    }
}
