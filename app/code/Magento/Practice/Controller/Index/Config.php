<?php
/**
 * Magento Controller Index Config
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Practice\Helper\Data;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Config
 * @package Magento\Practice\Controller\Index
 */
class Config extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * Config constructor.
     * @param Context $context
     * @param Data $helperData
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        Data $helperData,
        PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->helperData = $helperData;
        return parent::__construct($context);
    }


    /**
     * @return Page
     */
    public function execute()
    {
        echo $this->helperData->getGeneralConfig('enable');
        echo $this->helperData->getGeneralConfig('display_text');
        return $this->_pageFactory->create();
    }
}
