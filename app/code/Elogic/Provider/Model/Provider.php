<?php
/**
 * Elogic Model Provider
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Model;

use Elogic\Provider\Api\Data\ProviderInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Provider
 * @package Elogic\Provider\Model
 */
class Provider extends AbstractModel implements ProviderInterface
{
    /**
     * Get Post Id
     *
     * @return array|int|mixed|null
     */
    public function getPostId(): int
    {
        return $this->getData(self::POST_ID);
    }

    /**
     * Set Post Id
     *
     * @param int $postId
     * @return Provider
     */
    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }

    /**
     * Get Name
     *
     * @return array|mixed|string|null
     */
    public function getName():string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return Provider
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get Description
     *
     * @return array|mixed|string|null
     */
    public function getDescription(): string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return Provider
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get Is Active
     *
     * @return array|int|mixed|null
     */
    public function getIsActive(): int
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set Is Active
     *
     * @param int $isActive
     * @return Provider
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get Image
     *
     * @return array|mixed|null
     */
    public function getImage(): array
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Set Image
     *
     * @param $image
     * @return Provider
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get Create At
     *
     * @return array|int|mixed|null
     */
    public function getCreatedAt(): int
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set Create At
     *
     * @param int $createdAt
     * @return Provider
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get Update At
     *
     * @return array|int|mixed|null
     */
    public function getUpdatedAt(): int
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set Update At
     *
     * @param int $updatedAt
     * @return Provider
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * Initialization model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Elogic\Provider\Model\ResourceModel\Provider::class);
    }
}
