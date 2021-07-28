<?php
/**
 * Magento Controller Index Display
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
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Display
 * @package Magento\Practice\Controller\Index
 */
class Display extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * Display constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * @return Page|ResultInterface
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
