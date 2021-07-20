<?php
/**
 * Elogic Save
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Controller\Adminhtml\Index;

use Elogic\Customers\Api\CustomersRepositoryInterface;
use Elogic\Customers\Model\CustomersFactory;
use Elogic\Customers\Model\CustomersRepository;
use Elogic\Customers\Model\PhotoUploader;
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
 * @package Elogic\Customers\Controller\Adminhtml\Customers
 */
class Save extends Customers
{
    /**
     * @var CustomersFactory
     */
    protected $customersFactory;

    /**
     * @var PhotoUploader
     */
    protected $photoUploader;

    /**
     * @return void
     */
    protected $dataPersistor;

    /**
     * @var CustomersRepositoryInterface
     */
    protected $customersRepositoryInterface;

    /**
     * Save constructor.
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param CustomersFactory $customersFactory
     * @param CustomersRepositoryInterface $customersRepositoryInterface
     * @param PhotoUploader $photoUploader
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        CustomersFactory $customersFactory,
        CustomersRepositoryInterface $customersRepositoryInterface,
        PhotoUploader $photoUploader
    ) {
        $this->customersRepositoryInterface = $customersRepositoryInterface;
        $this->dataPersistor = $dataPersistor;
        $this->customersFactory = $customersFactory;
        $this->photoUploader = $photoUploader;
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
            $model = $this->customersFactory->create();
            $data = $this->_filterCustomersData($data);
            $model->setData($data);
            try {
                $this->messageManager->addSuccessMessage(__('You saved the FAQ.'));
                $this->dataPersistor->clear('elogic_customers_customers');
                $this->customersRepositoryInterface->save($model);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['customer_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the FAQ.'));
            }

            $this->dataPersistor->set('elogic_customers_customers', $data);
            return $resultRedirect->setPath('*/*/edit', ['customer_id' => $this->getRequest()->getParam('customer_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * @param array $rawData
     * @return array
     */
    protected function _filterCustomersData(array $rawData): array
    {
        $data = $rawData;
        if (isset($data['photo'][0]['name'])) {
            $data['photo'] = $data['photo'][0]['name'];
        } else {
            $data['photo'] = null;
        }
        return $data;
    }
}
