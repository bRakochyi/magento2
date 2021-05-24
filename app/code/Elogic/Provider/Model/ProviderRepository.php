<?php

namespace Elogic\Provider\Model;

use Elogic\Provider\Api\ProviderRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ProviderRepository implements ProviderRepositoryInterface
{
    /**
     * @var \Elogic\Provider\Model\ProviderFactory
     */
    protected $providerFactory;


    /**
     * @var \Elogic\Provider\Model\ResourceModel\Provider
     */
    protected $providerResourceModel;


    /**
     * @var \Elogic\Provider\Model\ResourceModel\Provider\CollectionFactory
     */
    protected $providerCollectionFactory;


    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @var SearchResultsInterface
     */
    protected $searchResultsFactory;


    /**
     * ProviderRepository constructor.
     * @param \Elogic\Provider\Model\ProviderFactory $providerFactory
     * @param ResourceModel\Provider $providerResourceModel
     * @param ResourceModel\Provider\CollectionFactory $providerCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SearchResultsInterface $searchResultsFactory
     */
    public function __construct(
        \Elogic\Provider\Model\ProviderFactory $providerFactory,
        \Elogic\Provider\Model\ResourceModel\Provider $providerResourceModel,
        \Elogic\Provider\Model\ResourceModel\Provider\CollectionFactory $providerCollectionFactory,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        \Magento\Framework\Api\SearchResultsInterface $searchResultsFactory
    ) {
        $this->providerFactory = $providerFactory;
        $this->providerResourceModel = $providerResourceModel;
        $this->providerCollectionFactory = $providerCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }


    /**
     * @param \Elogic\Provider\Api\Data\ProviderInterface|Provider $model
     * @return \Elogic\Provider\Api\Data\ProviderInterface|Provider|ResourceModel\Provider
     * @throws CouldNotSaveException
     */
    public function save($model)
    {
        try {
            return $this->providerResourceModel->save($model);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__("Sorry. I cannot save your provider."));
        }
    }


    /**
     * @param \Elogic\Provider\Api\Data\ProviderInterface|Provider $model
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete($model)
    {
        try {
            $this->providerResourceModel->delete($model);
            return true;
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__("Sorry. I cannot delete your provider."));
        }
    }


    /**
     * @param int $id
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function deleteById($id)
    {
        try {
            $this->providerResourceModel->delete($this->getById($id));

            return true;
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__("Sorry. I cannot delete your provider."));
        }
    }


    /**
     * @param int $id
     * @return \Elogic\Provider\Api\Data\ProviderInterface|Provider
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        try {
            $model = $this->providerFactory->create();
            $this->providerResourceModel->load($model, $id);

            return $model;
        } catch (\Exception $e) {
            throw new NoSuchEntityException(__("Sorry. No provider with id."));
        }
    }


    /**
     * @param \Magento\Framework\Api\SearchCriteria $searchCriteria
     * @return \Magento\Framework\Api\SearchCriteriaInterface
     */
    public function getList($searchCriteria)
    {
        $collection = $this->providerCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResult = $this->searchResultsFactory->create();

        $searchResult->setSearchCriteria($searchCriteria)
            ->setTotalCount($collection->getSize())
            ->setItems($collection->getItems());

        return $searchResult;
    }


    /**
     * @return mixed
     */
    public function getEmptyModel()
    {
        return $this->providerFactory->create();
    }
}
