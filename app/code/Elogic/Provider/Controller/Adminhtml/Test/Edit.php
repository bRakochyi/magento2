<?php
/**
 * Elogic Edit
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
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

    /**
     * Edit page
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     * @var \Magento\Framework\Controller\ResultFactory $resultPage
     */
    public function execute()
    {

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
