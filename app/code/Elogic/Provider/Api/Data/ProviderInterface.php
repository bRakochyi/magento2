<?php
/**
 * Elogic Provider Interface
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Api\Data;

/**
 * Interface ProviderInterface
 * @package Elogic\Provider\Api\Data
 */
interface ProviderInterface
{
    /**
     * Constant for column's name "post_id" in table elogic_provider
     */
    const POST_ID = 'post_id';

    /**
     * Constant for column's name "name" in table elogic_provider
     */
    const NAME = 'name';

    /**
     * Constant for column's name "description" in table elogic_provider
     */
    const DESCRIPTION = 'description';

    /**
     * Constant for column's name "is_active" in table elogic_provider
     */
    const IS_ACTIVE = 'is_active';

    /**
     * Constant for column's name "image" in table elogic_provider
     */
    const IMAGE = 'image';

    /**
     * Constant for column's name "create_at" in table elogic_provider
     */
    const CREATED_AT = 'created_at';

    /**
     * Constant for column's name "update_at" in table elogic_provider
     */
    const UPDATED_AT = 'updated_at';
    /**
     * Return provider id
     *
     * @return int|null
     */
    public function getPostId();

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId($postId);

    /**
     * Returns provider name
     *
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Return provider description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * Returns provider activity flag
     *
     * @return int
     */
    public function getIsActive();

    /**
     * @param int $isActive
     * @return $this
     */
    public function setIsActive($isActive);

    /**
     * Returns rule condition
     */
    public function getImage();

    /**
     * @param $image
     * @return $this
     */
    public function setImage($image);

    /**
     * Returns stop rule processing flag
     *
     * @return int|null
     */
    public function getCreatedAt();

    /**
     * @param int $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Returns rule sort order
     *
     * @return int|null
     */
    public function getUpdatedAt();

    /**
     * @param int $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

}
