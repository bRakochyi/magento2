<?php
namespace Elogic\Provider\Api\Data;
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Interface ProviderInterface
 * @package Elogic\Provider\Api\Data
 */
interface ProviderInterface extends \Magento\Framework\Api\CustomAttributesDataInterface
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
     *
     * @return int|null
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getPostId();

    /**
     * @param int $postId
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setPostId($postId);

    /**
     * Returns vendor name
     *
     * @return string
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getName();

    /**
     * @param string $name
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setName($name);

    /**
     * Returns vendor description
     *
     * @return string|null
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setDescription($description);

    /**
     * Returns vendor activity flag
     *
     * @return int
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getIsActive();

    /**
     * @param int $isActive
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setIsActive($isActive);

    /**
     * Returns rule condition
     * @since 100.1.0
     */
    public function getImage();

    /**
     * @param $image
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setImage($image);

    /**
     * Returns stop rule processing flag
     *
     * @return int|null
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getCreatedAt();

    /**
     * @param int $createdAt
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setCreatedAt($createdAt);

    /**
     * Returns rule sort order
     *
     * @return int|null
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getUpdatedAt();

    /**
     * @param int $updatedAt
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setUpdatedAt($updatedAt);

}
