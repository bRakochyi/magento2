<?php
namespace Elogic\Provider\Api;
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Interface ProviderRepositoryInterface
 * @package Elogic\Provider\Api
 */
interface ProviderRepositoryInterface
{
    /**
     * @param \Elogic\Provider\Api\Data\ProviderInterface $provider
     * @return \Elogic\Provider\Api\Data\ProviderInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function save(\Elogic\Provider\Api\Data\ProviderInterface $provider);

    /**
     * @param int $postId
     * @return \Elogic\Provider\Api\Data\ProviderInterface
     * @throws \Elogic\Provider\Api\Data\ProviderInterface
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function get($postId);

    /**
     * @param \Elogic\Provider\Api\Data\ProviderInterface $provider
     * @return bool
     * @throws \Elogic\Provider\Api\Data\ProviderInterface
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function delete(\Elogic\Provider\Api\Data\ProviderInterface $provider);

    /**
     * @param int $postId
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function deleteById($postId);
}
