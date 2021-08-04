<?php
/**
 * Elogic Delete
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Controller\Adminhtml\Index;

use Elogic\News\Controller\Adminhtml\Index\News;
use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Elogic\News\Api\NewsRepositoryInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;

/**
 * Class Delete
 *
 * @package Elogic\News\Controller\Adminhtml\Index
 */
class Delete extends News
{
    /**
     * Property for Api NewsRepositoryInterface
     *
     * @var NewsRepositoryInterface
     */
    protected $newsRepositoryInterface;

    /**
     * Delete construct
     *
     * @param Context $context
     * @param NewsRepositoryInterface $newsRepositoryInterface
     */
    public function __construct
    (
        Action\Context $context,
        NewsRepositoryInterface $newsRepositoryInterface
    ) {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
        parent::__construct($context);
    }

    /**
     * Method deleted for news
     *
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute(): object
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('news_id');
        if ($id) {
            try {
                $this->newsRepositoryInterface->deleteById($id);
                $this->messageManager->addSuccessMessage(__('You deleted the News.'));
                return $resultRedirect->setPath('*/*/');
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['news_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a News to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
