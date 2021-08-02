<?php
/**
 * Elogic Edit
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Controller\Adminhtml\Index;

use Elogic\News\Controller\Adminhtml\Index\News;
use Elogic\News\Model\NewsRepository;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 *
 * @package Elogic\News\Controller\Adminhtml\Index
 */
class Edit extends News
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var NewsRepository
     */
    protected $newsRepository;

    /**
     * Edit construct
     *
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param NewsRepository $newsRepository
     */
    public function __construct
    (
        Action\Context $context,
        PageFactory $resultPageFactory,
        NewsRepository $newsRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->newsRepository = $newsRepository;
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

        if ($id = (int) $this->getRequest()->getParam('news_id')) {
            try {
                $news = $this->newsRepository->get($id);

                $resultPage->getConfig()->getTitle()->prepend(__($news->getNewsTitle()));
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('This News no longer exists.'));

                return $this->_redirect('*/*/index');
            }
        } else {
            $resultPage->getConfig()->getTitle()->prepend(__('New News'));
        }
        return $resultPage;
    }
}
