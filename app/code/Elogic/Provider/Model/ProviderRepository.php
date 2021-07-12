<?php
/**
 * Copyright © Bohdan Rakochyi, Inc. All rights reserved.
 * See COPYING.txt for license details.
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

    /** @noinspection PhpMissingReturnTypeInspection */
    public function get($postId)
    {
        $provider = $this->providerFactory->create();


        $provider->load($postId);
        if (!$provider->getId()) {
            throw new NoSuchEntityException(__('Faq with id "%1" does not exist.', $postId));
        }

        return $provider;
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function delete(ProviderInterface $provider)
    {
        try {
            $this->resource->delete($provider);
        } catch (\Exception $exception) {
            /** @noinspection PhpUndefinedClassInspection */
            throw new CouldNotDeleteException(__(
                'Could not delete the Faq: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @param $postId
     * @return bool
     */
    public function deleteById($postId)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        /** @noinspection PhpParamsInspection */
        return $this->delete($this->get($postId));
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function save(ProviderInterface $provider)
    {
        try {
            /** @noinspection PhpParamsInspection */
            $this->resource->save($provider);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $provider;
    }
}
