<?php
/**
 * Elogic Edit
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Controller\Adminhtml\Index;

use Elogic\Customers\Model\CustomersRepository;
use Elogic\Customers\Model\Customers;
use Elogic\Provider\Model\ProviderRepository;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 * @package Elogic\Customers\Controller\Adminhtml\Customers
 */
class Edit extends \Elogic\Customers\Controller\Adminhtml\Index\Customers
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var CustomersRepository
     */
    protected $customersRepository;

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param CustomersRepository $customersRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CustomersRepository $customersRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->customersRepository = $customersRepository;
        parent::__construct($context);
    }

    /**
     * Edit page
     *
     * @return ResponseInterface|ResultInterface
     * @var ResultFactory $resultPage
     */
    public function execute()
    {

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        if ($id = (int) $this->getRequest()->getParam('customer_id')) {
            try {
                $customers = $this->customersRepository->get($id);

                $resultPage->getConfig()->getTitle()->prepend(__($customers->getName()));
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('This Customer no longer exists.'));

                return $this->_redirect('*/*/index');
            }
        } else {
            $resultPage->getConfig()->getTitle()->prepend(__('New Customer'));
        }
        return $resultPage;
    }
}
