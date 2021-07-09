<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Model\Provider;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Elogic\Provider\Model\ResourceModel\Provider\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class DataProvider
 * @package Elogic\Provider\Model\Provider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var
     */
    protected $loadedData;

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;


    public $collection;


    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param StoreManagerInterface $storeManager
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,

        StoreManagerInterface $storeManager,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();

        $this->storeManager = $storeManager;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
            if ($model->getImage()) {
                $m['image'][0]['name'] = $model->getImage();
                $m['image'][0]['url'] = $this->getMediaUrl() . $model->getImage();
                $fullData = $this->loadedData;
                $this->loadedData[$model->getId()] = array_merge($fullData[$model->getId()], $m);
            }
        }
        $data = $this->dataPersistor->get('elogic_provider_provider');

        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('elogic_provider_provider');
        }

        return $this->loadedData;
    }

    /**
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'elogic_provider/tmp/feature/';
        return $mediaUrl;
    }
}
