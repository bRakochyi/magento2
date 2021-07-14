<?php
/**
 * Elogic Provider Repository
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\ValidatorException;
use Elogic\Provider\Model\ResourceModel\Provider as ResourceProvider;
use Elogic\Provider\Api\Data\ProviderInterface;
use Elogic\Provider\Api\ProviderRepositoryInterface;

/**
 * Class ProviderRepository
 * @package Elogic\Provider\Model
 */
class ProviderRepository implements ProviderRepositoryInterface
{
    /**
     * @var ResourceProvider
     */
    protected $resource;

    /**
     * @var ProviderFactory
     */
    protected $providerFactory;

    /**
     * ProviderRepository constructor.
     *
     * @param ResourceProvider $resource
     * @param ProviderFactory $providerFactory
     */
    public function __construct(
        ResourceProvider $resource,
        ProviderFactory $providerFactory
    ) {
        $this->providerFactory = $providerFactory;
        $this->resource = $resource;
    }

    /**
     * Get id
     *
     * @param int $postId
     * @return ProviderInterface|Provider
     * @throws NoSuchEntityException
     */
    public function get($postId)
    {
        $provider = $this->providerFactory->create();


        $provider->load($postId);
        if (!$provider->getId()) {
            throw new NoSuchEntityException(__('Faq with id "%1" does not exist.', $postId));
        }

        return $provider;
    }

    /**
     * Delete provider
     *
     * @param ProviderInterface $provider
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ProviderInterface $provider): bool
    {
        try {
            $this->resource->delete($provider);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Faq: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete with Id
     *
     * @param int $postId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($postId): bool
    {
        return $this->delete($this->get($postId));
    }

    /**
     * Save provider
     *
     * @param ProviderInterface $provider
     * @return ProviderInterface
     * @throws CouldNotSaveException
     */
    public function save(ProviderInterface $provider)
    {
        try {
            $this->resource->save($provider);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $provider;
    }
}
