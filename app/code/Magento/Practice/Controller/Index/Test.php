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
use Magento\Framework\DataObject;
use Magento\Framework\View\Result\Page;
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
     * @return Page
     */
    public function execute()
    {
        $textDisplay = new DataObject(array('text' => 'Magento'));
        $this->_eventManager->dispatch('magento_practice_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        return $this->_pageFactory->create();
    }
}
