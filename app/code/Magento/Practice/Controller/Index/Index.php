<?php
/**
 * Magento Controller Index Index
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
use Magento\Practice\Model\PostFactory;

/**
 * Class Index
 * @package Magento\Practice\Controller\Index
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * @var PostFactory
     */
    protected $_postFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param PostFactory $postFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        PostFactory $postFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    /**
     * @return Page|ResultInterface
     */
    public function execute()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        return $this->_pageFactory->create();

    }
}
