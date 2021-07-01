<?php

namespace Elogic\Provider\Controller\Test;

/**
 * Class Config
 * @package Elogic\Provider\Controller\Test
 */
class Config extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Elogic\Provider\Helper\Data
     */
    protected $helperData;

    /**
     * Config constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Elogic\Provider\Helper\Data $helperData
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Elogic\Provider\Helper\Data $helperData

    )
    {
        $this->helperData = $helperData;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        echo $this->helperData->getGeneralConfig('enable');
        echo $this->helperData->getGeneralConfig('display_text');
        exit();
    }
}
