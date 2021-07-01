<?php

namespace Elogic\Provider\Controller\Adminhtml\Delete;

/**
 * Class Index
 * @package Elogic\Provider\Controller\Adminhtml\Delete
 */
class Index extends \Magento\Backend\App\Action
{

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }


    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Elogic_Provider::delete');
    }
}
