<?php
/**
 * Elogic Delete
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Controller\Adminhtml\Test;

use Magento\Backend\App\Action\Context;
use Elogic\Provider\Model\Provider;
use Magento\Framework\Controller\ResultInterface;
use Elogic\Provider\Api\ProviderRepositoryInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
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
     *
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

    /**
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute(): object
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
