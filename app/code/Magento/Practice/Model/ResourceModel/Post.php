<?php
/**
 * Magento Resource Model Post
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Post
 * @package Magento\Practice\Model\ResourceModel
 */
class Post extends AbstractDb
{
    /**
     * Post constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    )
    {
        parent::__construct($context);
    }

    /**
     * Table name and id primary key
     */
    protected function _construct()
    {
        $this->_init('magento_practice_post', 'post_id');
    }
}
