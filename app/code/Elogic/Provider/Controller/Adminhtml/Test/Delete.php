<?php

namespace Elogic\Provider\Controller\Adminhtml\Test;

use Elogic\Provider\Model\Provider;
use Magento\Backend\App\Action\Context;
use Elogic\Provider\Api\ProviderRepositoryInterface;

/**
 * Class Delete
 * @package Elogic\Provider\Controller\Adminhtml\Test
 */
class Delete extends \Magento\Backend\App\Action
{

    protected $providerRepositoryInterface;


    public function __construct(
        Context $context,
        \Elogic\Provider\Api\ProviderRepositoryInterface $providerRepositoryInterface
    )
    {
        parent::__construct($context);
        $this->providerRepositoryInterface = $providerRepositoryInterface;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if (!($provider = $this->providerRepositoryInterface->create(Provider::class)->load($id))) {
            $this->messageManager->addError(__('Unable to proceed. Please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', ['_current' => true]);
        }
        try {
            $provider->delete();
            $this->messageManager->addSuccess(__('Your provider has been deleted !'));
        } catch (Exception $e) {
            $this->messageManager->addError(__('Error while trying to delete provider: '));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', ['_current' => true]);
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', ['_current' => true]);
    }


    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Elogic_Provider::delete');
    }
}
