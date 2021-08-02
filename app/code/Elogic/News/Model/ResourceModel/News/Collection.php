<?php
/**
 * Elogic News Collection
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Model\ResourceModel\News;

use Elogic\News\Model\News;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class News Collection
 *
 * @package Elogic\News\Model\Resource
 */
class Collection extends AbstractCollection
{
    /**
     * Initialization Collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(News::class, \Elogic\News\Model\ResourceModel\News::class);
    }
}
