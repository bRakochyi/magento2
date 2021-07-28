<?php
/**
 * Magento Block Display
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Block;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\Phrase;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Practice\Model\PostFactory;

/**
 * Class Display
 * @package Magento\Practice\Block
 */
class Display extends Template
{
    /**
     * @var PostFactory
     */
    protected $_postFactory;

    /**
     * Display constructor.
     * @param PostFactory $postFactory
     * @param Context $context
     */
    public function __construct
    (
        Context $context,
        PostFactory $postFactory
    )
    {
        parent::__construct($context);
        $this->_postFactory = $postFactory;
    }

    /**
     * @return Phrase
     */
    public function sayHello()
    {
        return __('Hello World');
    }

    /**
     * @return AbstractDb|AbstractCollection|null
     */
    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
}
