<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Controller\Adminhtml\Test;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class NewAction
 * @package Elogic\Provider\Controller\Adminhtml\Test
 */
class NewAction extends Provider
{
    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * NewAction constructor.
     * @param Context $context
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * New action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
