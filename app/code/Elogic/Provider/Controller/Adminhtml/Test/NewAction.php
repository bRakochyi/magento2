<?php

namespace Elogic\Provider\Controller\Adminhtml\Test;

use Elogic\Provider\Model\Provider;
use Magento\Backend\App\Action\Context;
use Elogic\Provider\Model\ProviderFactory;

/**
 * Class NewAction
 * @package Elogic\Provider\Controller\Adminhtml\Test
 */
class NewAction extends \Magento\Backend\App\Action
{
    /**
     * @var \Elogic\Provider\Model\ProviderFactory
     */
    protected $providerFactory;



    public function __construct(
        Context $context,
        \Elogic\Provider\Model\ProviderFactory $providerFactory
    )
    {
        $this->providerFactory = $providerFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $providerData = $this->getRequest()->getParam('provider');
        if (is_array($providerData)) {
            $provider = $this->providerFactory->create(Provider::class);
            $provider->setData($providerData)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}
