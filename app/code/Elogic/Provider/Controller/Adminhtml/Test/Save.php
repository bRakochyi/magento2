<?php
/**
 * Copyright © Bohdan Rakochyi, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Controller\Adminhtml\Test;

use Elogic\Provider\Api\ProviderRepositoryInterface;
use Elogic\Provider\Model\ImageUploader;
use Elogic\Provider\Model\ProviderFactory;
use Elogic\Provider\Model\ProviderRepository;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Save
 * @package Elogic\Provider\Controller\Adminhtml\Test
 */
class Save extends Provider
{
    /**
     * @var ProviderFactory
     */
    protected $providerFactory;

    /**
     * @var ImageUploader
     */
    protected $imageUploader;

    /**
     * @return void
     */
    protected $dataPersistor;

    /**
     * @var ProviderRepositoryInterface
     */
    protected $providerRepositoryInterface;

    /**
     * Save constructor.
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param ProviderFactory $providerFactory
     * @param ImageUploader $imageUploader
     * @param ProviderRepositoryInterface $providerRepositoryInterface
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        ProviderFactory $providerFactory,
        ImageUploader $imageUploader,
        ProviderRepositoryInterface $providerRepositoryInterface
    ) {
        $this->providerRepositoryInterface = $providerRepositoryInterface;
        $this->imageUploader = $imageUploader;
        $this->dataPersistor = $dataPersistor;
        $this->providerFactory = $providerFactory;
        parent::__construct($context);
    }

    /** @noinspection PhpMissingReturnTypeInspection
     * seve new or save edit
     */
    public function execute()
    {
        /**
         * @var Redirect $resultRedirect
         */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data = $this->getRequest()->getPostValue()) {
            $model = $this->providerFactory->create();
            $data = $this->_filterVendorData($data);
            $model->setData($data);
            try {
                $this->messageManager->addSuccessMessage(__('You saved the FAQ.'));
                $this->dataPersistor->clear('elogic_provider_provider');
                $this->providerRepositoryInterface->save($model);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['post_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the FAQ.'));
            }

            $this->dataPersistor->set('bohdan_vendor_vendor', $data);
            return $resultRedirect->setPath('*/*/edit', ['post_id' => $this->getRequest()->getParam('post_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * @param array $rawData
     * @return array
     */
    protected function _filterVendorData(array $rawData)
    {
        $data = $rawData;
        if (isset($data['image'][0]['name'])) {
            $data['image'] = $data['image'][0]['name'];
        } else {
            $data['image'] = null;
        }

        return $data;
    }
}
