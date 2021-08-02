<?php
/**
 * Elogic Save
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Controller\Adminhtml\Index;

use Elogic\News\Api\NewsRepositoryInterface;
use Elogic\News\Model\NewsFactory;
use Elogic\News\Model\NewsRepository;
use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Save
 *
 * @package Elogic\News\Controller\Adminhtml\Index
 */
class Save extends News
{
    /**
     * @var NewsFactory
     */
    protected $newsFactory;

    /**
     * @var DataPersistorInterface
     *
     * @return void
     */
    protected $dataPersistor;

    /**
     * @var NewsRepositoryInterface
     */
    protected $newsRepositoryInterface;

    /**
     * Save construct
     *
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param NewsFactory $newsFactory
     * @param NewsRepositoryInterface $newsRepositoryInterface
     */
    public function __construct
    (
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        NewsFactory $newsFactory,
        NewsRepositoryInterface $newsRepositoryInterface
    ) {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
        $this->newsFactory = $newsFactory;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save new or save edit
     *
     * @return Redirect|ResponseInterface|ResultInterface
     */
    public function execute(): object
    {
        /**
         * @var Redirect $resultRedirect
         */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data = $this->getRequest()->getPostValue()) {
            $model = $this->newsFactory->create();
            $model->setData($data);
            try {
                $this->messageManager->addSuccessMessage(__('You saved the FAQ.'));
                $this->dataPersistor->clear('elogic_news_news');
                $this->newsRepositoryInterface->save($model);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['news_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the FAQ.'));
            }

            $this->dataPersistor->set('elogic_news_news', $data);
            return $resultRedirect->setPath('*/*/edit', ['news_id' => $this->getRequest()->getParam('news_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
