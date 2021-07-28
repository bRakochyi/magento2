<?php
/**
 * Magento Controller Index Test
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Test
 *
 * @package Magento\Practice\Controller\Index
 */
class Test extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * Test constructor.
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
     * @return void
     */
    public function execute()
    {
        echo "Hello";
        exit;
    }
}
