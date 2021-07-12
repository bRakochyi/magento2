<?php
/**
 * Copyright © Bohdan Rakochyi, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Controller\Adminhtml\Test;

use Elogic\Provider\Model\ProviderRepository;
use Elogic\Provider\Model\Provider;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 * @package Elogic\Provider\Controller\Adminhtml\Test
 */
class Edit extends \Elogic\Provider\Controller\Adminhtml\Test\Provider
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ProviderRepository
     */
    protected $providerRepository;


    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ProviderRepository $providerRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ProviderRepository $providerRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->providerRepository = $providerRepository;
        parent::__construct($context);
    }

    /** @noinspection PhpMissingReturnTypeInspection
     *edit page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        if ($postId = (int) $this->getRequest()->getParam('post_id')) {
            try {
                $provider = $this->providerRepository->get($postId);

                $resultPage->getConfig()->getTitle()->prepend(__($provider->getName()));
            } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('This Provider no longer exists.'));

                return $this->_redirect('*/*/index');
            }
        } else {
            $resultPage->getConfig()->getTitle()->prepend(__('New Provider'));
        }
        return $resultPage;
    }
}
