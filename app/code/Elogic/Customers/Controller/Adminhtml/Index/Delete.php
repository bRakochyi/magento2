<?php
/**
 * Elogic Delete
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Controller\Adminhtml\Index;

use Elogic\Provider\Api\ProviderRepositoryInterface;
use Exception;
use Magento\Backend\App\Action\Context;
use Elogic\Customers\Model\Customers;
use Magento\Framework\Controller\ResultInterface;
use Elogic\Customers\Api\CustomersRepositoryInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;

/**
 * Class Delete
 *
 * @package Elogic\Customers\Controller\Adminhtml\Customers
 */
class Delete extends \Elogic\Customers\Controller\Adminhtml\Index\Customers
{
    /**
     * @var CustomersRepositoryInterface
     */
    protected $customersRepositoryInterface;

    /**
     * Delete constructor.
     *
     * @param Context $context
     * @param CustomersRepositoryInterface $customersRepositoryInterface
     */
    public function __construct(
        Context $context,
        CustomersRepositoryInterface $customersRepositoryInterface
    ) {
        $this->customersRepositoryInterface = $customersRepositoryInterface;
        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute(): object
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('customer_id');
        if ($id) {
            try {
                $this->customersRepositoryInterface->deleteById($id);
                $this->messageManager->addSuccessMessage(__('You deleted the Customer.'));
                return $resultRedirect->setPath('*/*/');
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['customer_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a Customer to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
