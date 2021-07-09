<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Controller\Adminhtml\Test;

use Magento\Backend\App\Action\Context;
use Elogic\Provider\Model\Provider as Provider;
use Magento\Framework\Controller\ResultInterface;
use Elogic\Provider\Api\ProviderRepositoryInterface;

/**
 * Class Delete
 * @package Elogic\Provider\Controller\Adminhtml\Test
 */
class Delete extends \Elogic\Provider\Controller\Adminhtml\Test\Provider
{
    /**
     * @var ProviderRepositoryInterface
     */
    protected $providerRepositoryInterface;

    /**
     * Delete constructor.
     * @param Context $context
     * @param ProviderRepositoryInterface $providerRepositoryInterface
     */
    public function __construct(
        Context $context,
        ProviderRepositoryInterface $providerRepositoryInterface
    ) {
        $this->providerRepositoryInterface = $providerRepositoryInterface;
        parent::__construct($context);
    }


    /** @noinspection PhpMissingReturnTypeInspection */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('post_id');
        if ($id) {
            try {
                $this->providerRepositoryInterface->deleteById($id);
                $this->messageManager->addSuccessMessage(__('You deleted the Provider.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['post_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a Provider to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
