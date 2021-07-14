<?php
/**
 * Elogic Provider Repository Interface
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Api;

use Elogic\Provider\Api\Data\ProviderInterface;
/**
 * Interface ProviderRepositoryInterface
 * @package Elogic\Provider\Api
 */
interface ProviderRepositoryInterface
{
    /**
     * @param ProviderInterface $provider
     * @return ProviderInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(ProviderInterface $provider);

    /**
     * @param int $postId
     * @return ProviderInterface
     * @throws ProviderInterface
     */
    public function get($postId);

    /**
     * @param ProviderInterface $provider
     * @return bool
     * @throws ProviderInterface
     */
    public function delete(ProviderInterface $provider);

    /**
     * @param int $postId
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($postId);
}
