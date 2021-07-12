<?php
/**
 * Copyright © Bohdan Rakochyi, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Controller\Adminhtml\Test;

use Elogic\Provider\Model\ResourceModel\Provider\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;

/**
 * Class MassDelete
 * @package Elogic\Provider\Controller\Adminhtml\Test
 */
class MassDelete extends Action
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * MassDelete constructor.
     * @param Action\Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Action\Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /** @noinspection PhpMissingReturnTypeInspection
     * delete providers
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $categoryDeleted = 0;

            foreach ($collection as $category) {
                $category->delete();
                $categoryDeleted++;
            }

            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $categoryDeleted)
            );
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        /**
         * @noinspection PhpPossiblePolymorphicInvocationInspection
         */
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('provider/test/index');
    }
}
